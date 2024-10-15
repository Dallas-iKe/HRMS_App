### HR Management System - README

---

### Overview

This **Human Resources Management System (HRMS)** is a web-based application developed using **PHP** and **MySQL**. It allows the management of employees, departments, training, vacations, evaluations, and salaries within an organization. Different user roles (Admin, HR, Manager, and Employee) are provided with role-specific access to ensure that the system meets the needs of all users, from managing vacations to generating evaluations.

### Features

- **Employee Management**:
  - Add, edit, and view employee details based on role access.
  - Managers can only edit and view employees under their supervision.
  
- **Attendance Management**:
  - Admin can manage attendance records for all employees.
  - HR manages attendance for Managers and Employees, while Managers handle employees under their control.

- **Vacation Management**:
  - Admin and HR can view all types of vacations and change their statuses (Accepted, Denied, Waiting).
  - Employees can request vacations, which go through an approval process.
  
- **Evaluation System**:
  - Admin and HR can view all evaluations.
  - Managers can add evaluations for employees under them.
  - Employees can view their own evaluations.
  
- **Training Management**:
  - Admin and HR can add trainings for all employees.
  - Managers can assign training for employees under their supervision.
  - Employees can view their assigned training.

- **Salary Management**:
  - Admin manages salary data for all employees.
  - HR can view and manage salaries for Managers and Employees.
  - Employees can view their salary details.

- **Report System**:
  - Employees and Managers can submit reports.
  - Admin and HR can view submitted reports.

- **User Search**:
  - Admin, HR, and Managers can search for employees by name, skills, etc.

- **Company Rules**:
  - Admin and HR can add or update company rules.
  - Employees and Managers can view company rules.

---

### System Structure

- **Roles**:
  - **Admin**: Full control over the system (add, edit, delete employees, view all data, manage roles).
  - **HR**: Manages employees, vacations, training, evaluations, and salaries but cannot manage Admin roles.
  - **Manager**: Can view and manage employees under their supervision and manage their training, attendance, and evaluations.
  - **Employee**: Can view their own information, submit vacation requests, and view their own evaluations, training, and salaries.

---

### Database Structure

- **Employee Table**:
  - Stores information about employees (ID, name, mobile, email, username, password, address, skills, role).

- **Trainings Table**:
  - Records employee training data (ID, registration date, title, year, description, employee ID).

- **Vacation Table**:
  - Manages employee vacation requests (ID, from date, title, to date, status, employee ID).

- **Salary Table**:
  - Stores salary, bonus, and loan information for each employee (ID, amount, bonus, loan, last update, employee ID).

- **Attendance Table**:
  - Records employee attendance details (ID, employee ID, date, time, type).

- **Evaluation Table**:
  - Stores evaluations with scores and comments for employees (ID, employee ID, score, text).

- **Roles Table**:
  - Defines roles in the system such as Admin, HR, Manager, Employee (ID, role name).

---

### Installation Instructions

1. **Clone the repository**:

   ```bash
   git clone https://github.com/Dallas-iKe/HRMS_App.git
   cd HRMS_App
   ```

2. **Database Setup**:
   - Import the `db.sql` file into your MySQL database to set up the necessary tables.
   - Update the `db.php` file with your MySQL database credentials.

3. **Setup XAMPP/WAMP**:
   - Place the project files in the `htdocs` directory (for XAMPP) or the respective directory for WAMP.
   - Start Apache and MySQL from the XAMPP/WAMP control panel.

4. **Access the System**:
   - Open your browser and navigate to `http://localhost/HRMS_App/login.php`.
   - Use default credentials (create an admin user or import them directly into the database).

---

### Roles and Permissions

- **Admin**:
  - Can view, add, edit, and delete any employee.
  - Can manage roles, salaries, vacations, and company rules.
  - Full access to all system features.
  
- **HR**:
  - Can view, add, and edit employees, vacations, salaries, and training.
  - Cannot modify Admin roles.
  
- **Manager**:
  - Can view and manage employees under their control.
  - Can add evaluations, attendance, and assign training.
  
- **Employee**:
  - Can view their own details, training, evaluations, and salary.
  - Can request vacations and submit reports.

---

### Folder Structure

```bash
.
├── Assets/                # Logo and other assets
├── css/                   # CSS files for various pages
├── db.php                 # Database connection file
├── add_employee.php        # Add employee page
├── edit_employee.php       # Edit employee page
├── add_vacation.php        # Add vacation page
├── evaluation.php          # Evaluation management page
├── training_list.php       # Training list and management page
├── attendance_list.php     # Attendance management page
├── search.php              # Search employees page
├── manage_roles.php        # Manage roles page
├── dashboard.php           # Main dashboard page
└── index.php               # Landing page (Login)
```

---

### Usage

- **Login**:
  - Navigate to the login page (`login.php`) and use your credentials.
  - Based on your role, you will be redirected to the appropriate dashboard.

- **Dashboard**:
  - Access all relevant features based on your role, such as managing employees, viewing evaluations, or submitting reports.

---

### Future Improvements

- **Email Notifications**:
  - Add email notifications for vacation approvals, evaluation submissions, and training assignments.
  
- **Statistical Charts**:
  - Visualize employee data (e.g., attendance, salary trends, evaluations) using charts on the dashboard.

- **More Reports**:
  - Create advanced report generation for HR and Admin users (e.g., monthly performance, salary summaries).

---

### Contact

For support or queries, please contact [clarity471@gmail.com].
