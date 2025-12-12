create database ABC_Company
Go
Use SystemDatabases

create table Employee_List(
	Employee_Number int,
	Employee_Name nvarchar(64),
	Primary key(Employee_Number),
)
Go

create table Department_Code(
	Department_Name nvarchar(64),
)
Go

Create table Employee_Working_day(
	Number_of_day_off_with_pay int,
	Number_of_day_off_without_pay int,
	Number_of_working_days int,
	Primary key (Number_of_working_days),
)
Go

Create table Salary(
	Basic_Salary int,
	Gross_Salary int,
	Net_Salary int,
)
Go

Insert into Employee_List(Employee_Name,Employee_Number) values ('Nguyen Van A', 1)
Insert into Employee_List(Employee_Name,Employee_Number) Values ('Le Tan Binh', 2)
Insert into Employee_List(Employee_Name,Employee_Number) Values ('Nguyen Lan', 3)
Insert into Employee_List(Employee_Name,Employee_Number) Values ('Mai Tuan Anh', 4)

Select*from Employee_List
Insert into Department_Code(Department_Name) Values ('IT')
Insert into Department_Code(Department_Name) Values ('HR')

Select*from Department_Code
Insert into Employee_Working_day(Number_of_working_days,Number_of_day_off_with_pay,Number_of_day_off_without_pay) Values (22,1,0)
Insert into Employee_Working_day(Number_of_working_days,Number_of_day_off_with_pay,Number_of_day_off_without_pay) Values (21,1,0)
Insert into Employee_Working_day(Number_of_working_days,Number_of_day_off_with_pay,Number_of_day_off_without_pay) Values (21,0,1)
Insert into Employee_Working_day(Number_of_working_days,Number_of_day_off_with_pay,Number_of_day_off_without_pay) Values (20,0,1)

Select*from Employee_Working_day
Insert into Salary(Basic_Salary,Gross_Salary,Net_Salary) Values (1000, 22000, 20000)
Insert into Salary(Basic_Salary,Gross_Salary,Net_Salary) Values (1200, 26400, 20000)
Insert into Salary(Basic_Salary,Gross_Salary,Net_Salary) Values (600, 13200, 12000)
Insert into Salary(Basic_Salary,Gross_Salary,Net_Salary) Values (500, 11000, 10000)
