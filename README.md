# Web Application Security | INFO 4345 Class Assignment
<h1>Assignments</h1>
<h3>Assignment 1: Client and Server Side</h3>
<h5>index.html:</h5>
This file contains the HTML code for the student details form.
It includes form elements such as text inputs, labels, and a submit button.
Users interact with this form to input their details. <br>
<be>
<h5>validation.js:</h5>
This file contains JavaScript code for client-side validation of the form inputs.
It ensures that the user input meets certain criteria before the form is submitted.
JavaScript functions in this file handle form validation and display error messages if necessary.
<be></be>
<h5>server.php:</h5>
This file represents the output page after the form submission.
It contains PHP code to process the form data and display a "Form created successfully" message.
Users are redirected to this page after successfully submitting the form, where they receive confirmation of their submission.

<h3>Assignment 2: Authentication</h3>
<h5>register.php:</h5> 
it contains the registration page where new users create an account.
<h5>login.php:</h5> it handles user authentication, including input validation and session management.
<h5>logout.php:</h5> it handles the user's logout by terminating the session and redirecting to the login page.
<h5>style.css:</h5> it contains the format and styling of the pages.
<h5>auth_session.php:</h5> ensuring that only authenticated users can access the content beyond this point. If a user tries to access this page without being logged in, they will be redirected to the login page.
<h5>db.php:</h5> It establishes a connection to the MySQL database running on the local server. If the connection fails, it outputs an error message indicating failure to connect to the database.
<be></be>

<h3>Assignment 4: XSS & CSRF</h3>
<h5>updated role.php:</h5> 
updated role.php includes added CSP header.
<h5>updated auth_session.php:</h5> updated auth_session page include CSRF token
<h5>updated register.php:</h5> updated register.php page includes CSP header.
<h5>updated index.php</h5> updated index.php includes CSP header.
<h5>updated student_form.php</h5> updated student_form.php includes CSP header.
<be></be>
<h1>Navigation</h1>
1) Log in through login.php or registering a new account through register.php. <be>
2) Fill in the student detail form once authenticated  via index.html. 







