# Database Normalization for Salary Table

## Original Salary Table (Unnormalized)
The original data is provided in separate tables: Department, Employee, and Salary.

Department:
| DeptID | DeptName |
|--------|----------|
| IT     | Information Technology |
| HR     | Human Resources |
| SALE   | Sales Department |

Employee:
| EmpID | EmpName | DeptID | Age | Gender | Status |
|-------|---------|--------|-----|--------|--------|
| A1    | Nguyễn Văn A | IT | 22 | 0 | 0 |
| A2    | Lê Thị Bình | IT | 21 | 1 | 0 |
| ...   | ...     | ...  | ... | ... | ... |

Salary:
| EmpID | Basic | Total | Net |
|-------|-------|-------|-----|
| A1    | 1000  | 22000 | 20000 |
| A2    | 1200  | 26400 | 23000 |
| ...   | ...   | ...   | ...  |

Functional Dependencies:
- DeptID → DeptName
- EmpID → EmpName, DeptID, Age, Gender, Status
- EmpID → Basic, Total, Net

## 1NF (First Normal Form)
All tables are in 1NF as there are no repeating groups or multi-valued attributes. All attributes are atomic.

## 2NF (Second Normal Form)
All tables are in 2NF since there are no partial dependencies. The primary keys determine all non-key attributes directly.

## 3NF (Third Normal Form)
All tables are in 3NF as there are no transitive dependencies. For example, in Employee, DeptID determines DeptName, but DeptName is in a separate table, so no transitive dependency within Employee.

Final normalized schema:
- Department(DeptID, DeptName)
- Employee(EmpID, EmpName, DeptID, Age, Gender, Status)
- Salary(EmpID, Basic, Total, Net)