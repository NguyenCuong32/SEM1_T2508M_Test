export default function initManhdevForms() {

    function collectFormValues(form) {
        const hasFile = form.querySelector('input[type="file"]');

        if (hasFile || (form.enctype && form.enctype.includes("multipart"))) {
            const fd = new FormData();
            const els = form.querySelectorAll("input,select,textarea");

            els.forEach(el => {
                if (!el.name || el.disabled) return;
                if (el.type === "checkbox") {
                    const checks = form.querySelectorAll(`input[name="${el.name}"][type="checkbox"]`);
                    if (checks.length > 1) {
                        if (el.checked) fd.append(el.name, el.value);
                    } else {
                        fd.append(el.name, el.checked ? el.value : "");
                    }
                } else if (el.type === "radio") {
                    if (el.checked) fd.append(el.name, el.value);
                } else if (el.type === "file") {
                    if (el.files?.length) {
                        Array.from(el.files).forEach(f => fd.append(el.name, f));
                    } else fd.append(el.name, "");
                } else if (el.tagName === "SELECT" && el.multiple) {
                    Array.from(el.selectedOptions).forEach(opt => fd.append(el.name, opt.value));
                } else fd.append(el.name, el.value);
            });

            return { isFormData: true, payload: fd };
        }

        const data = {};
        const elements = form.querySelectorAll("input,select,textarea");

        elements.forEach(el => {
            if (!el.name || el.disabled) return;
            if (el.type === "checkbox") {
                const boxes = form.querySelectorAll(`input[name="${el.name}"][type="checkbox"]`);
                if (boxes.length > 1) {
                    if (!Array.isArray(data[el.name])) data[el.name] = [];
                    if (el.checked) data[el.name].push(el.value);
                } else data[el.name] = el.checked ? el.value : "";
            } else if (el.type === "radio") {
                if (el.checked) data[el.name] = el.value;
            } else if (el.tagName === "SELECT" && el.multiple) {
                data[el.name] = Array.from(el.selectedOptions).map(opt => opt.value);
            } else data[el.name] = el.value;
        });

        return { isFormData: false, payload: data };
    }

    async function processFormSubmit(form, e) {
        e.preventDefault();
        if (typeof e.stopImmediatePropagation === "function") e.stopImmediatePropagation();

        if (form.__manhdevSubmitting) return;
        form.__manhdevSubmitting = true;

        let action = form.getAttribute("action") || "/";

        
        if (!action.startsWith("http")) {
            action = "http://127.0.0.1:8000" + action;
        }
        
        const method = (form.getAttribute("method") || "POST").toUpperCase();
        const swalSuccess = form.getAttribute("swal_success");
        const timeLoad = parseInt(form.getAttribute("time_load") || "0", 10);

        const typeOverride = form.getAttribute("type") || form.dataset.type;
        const { isFormData, payload } = collectFormValues(form);

        if (typeOverride) {
            if (isFormData) payload.set("type", typeOverride);
            else payload.type = payload.type || typeOverride;
        }

        const btn = form.querySelector('button[type=submit]');

        let oldBtnHtml = "";
        if (btn) {
            oldBtnHtml = btn.innerHTML;
            btn.dataset.oldText = oldBtnHtml;
            if (btn.textContent.trim() === "") {
                btn.innerHTML = '<i class="ri-loader-line spin"></i>';
            } else {
                
            }
            btn.disabled = true;
        }

        function restoreButton() {
            if (!btn) return;
            btn.disabled = false;
            btn.innerHTML = btn.dataset.oldText ?? oldBtnHtml ?? "Gửi";
        }

        let body, headers = {};
        if (!isFormData) {
            headers["Content-Type"] = "application/json";
            headers["Accept"] = "application/json";
            body = JSON.stringify(payload);
        } else body = payload;

        const token = localStorage.getItem("token");
        if (token) headers["Authorization"] = "Bearer " + token;

        try {
            const res = await fetch(action, { method, headers, body });

            let data;
            try {
                data = await res.json();
            } catch {
                alert("Error");
                restoreButton();
                form.__manhdevSubmitting = false;
                return;
            }

            if (data.status !== "success") {
                alert(data.msg ?? "Error");
            } else {
                if (swalSuccess !== "none") alert(data.msg ?? "Success");

                if (data.token && data.user) {
                    try {
                        localStorage.setItem("token", data.token);
                        localStorage.setItem("user", JSON.stringify(data.user));
                    } catch (err) { }
                    form.dispatchEvent(new CustomEvent("manhdev:login", { detail: { user: data.user, token: data.token } }));
                }
            }

            if (data.redirect) {
                setTimeout(() => window.location.href = data.redirect, timeLoad);
            }

            restoreButton();
            return data;
        } catch {
            alert("Error");
        } finally {
            restoreButton();
            form.__manhdevSubmitting = false;
        }
    }

    function onSubmit(e) {
        const form = e.target;
        if (!(form instanceof HTMLFormElement)) return;
        if (form.getAttribute("manhdev-api") !== "true") return;

        return processFormSubmit(form, e);
    }

    document.addEventListener("submit", onSubmit, true);

    return {
        stop() {
            document.removeEventListener("submit", onSubmit, true);
        },
    };
}