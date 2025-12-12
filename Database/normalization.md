# Database Normalization for Salary Table

## Original Salary Table (Unnormalized)
The original salary table contains the following columns with sample data:

| EmpID | EmpName | DeptID | DeptName | DeptLocation | Salary | ProjectID | ProjectName |
|-------|---------|--------|----------|--------------|--------|-----------|-------------|
| 1     | John    | D1     | HR       | NY           | 50000  | P1        | ProjectA    |
| 2     | Jane    | D1     | HR       | NY           | 55000  | P2        | ProjectB    |
| 3     | Bob     | D2     | IT       | CA           | 60000  | P1        | ProjectA    |
| 4     | Alice   | D2     | IT       | CA           | 65000  | P3        | ProjectC    |

Functional Dependencies:
- EmpID → EmpName, DeptID, Salary
- DeptID → DeptName, DeptLocation
- ProjectID → ProjectName
- EmpID, ProjectID → (assignment, but simplified)

## 1NF (First Normal Form)
The table is already in 1NF as there are no repeating groups or multi-valued attributes. All attributes are atomic.

## 2NF (Second Normal Form)
To achieve 2NF, we remove partial dependencies. The primary key is EmpID (assuming unique), but DeptName depends on DeptID, not the full key.

Decomposed tables:
- **Employee**: EmpID (PK), EmpName, DeptID (FK), Salary
- **Department**: DeptID (PK), DeptName, DeptLocation
- **Project**: ProjectID (PK), ProjectName
- **WorksOn**: EmpID (FK), ProjectID (FK) - assuming employees work on projects

## 3NF (Third Normal Form)
In 2NF tables, check for transitive dependencies.
- Employee: No transitive dependencies.
- Department: DeptID → DeptName → DeptLocation (if DeptName determines DeptLocation uniquely). To achieve 3NF, we can assume DeptName is unique or move DeptLocation to a separate table if needed. For this example, we'll keep it as is, assuming DeptID is the key and DeptLocation depends directly on DeptID.
- Project: No transitive dependencies.
- WorksOn: No transitive dependencies.

Final normalized schema:
- Employee(EmpID, EmpName, DeptID, Salary)
- Department(DeptID, DeptName, DeptLocation)
- Project(ProjectID, ProjectName)
- WorksOn(EmpID, ProjectID)