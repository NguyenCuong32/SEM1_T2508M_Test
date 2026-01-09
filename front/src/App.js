import "./Custom.css";
import 'remixicon/fonts/remixicon.css';
import { BrowserRouter, Routes, Route } from "react-router-dom";
import initManhdevForms from "./Form";
import { useEffect } from "react";
import Header from "./Header";
import Footer from "./Footer";
import Home from "./Home";
import AddNew from "./AddNew";
import EditNew from "./EditNew";

function App() {
  useEffect(() => {
    initManhdevForms();
  }, []);

  return (
    <BrowserRouter>
      <Header />
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/add-new" element={<AddNew />} />
        <Route path="/edit/:id" element={<EditNew />} />
      </Routes>
      <Footer />
    </BrowserRouter>
  );
}

export default App;
