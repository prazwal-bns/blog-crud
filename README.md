Doctor Appointment System
1. Users Table
This table stores general information for all users (patients, doctors, and admins).
Column Name	Data Type	Description
user_id	INT (PK)	Primary key, unique ID for each user.
username	VARCHAR(100)	User's name.
email	VARCHAR(100)	Email address, unique for each user.
password	VARCHAR(255)	Hashed password.
role	ENUM('patient', 'doctor', 'admin')	User role.
created_at	TIMESTAMP	Record creation timestamp.
updated_at	TIMESTAMP	Record update timestamp.

2. Patients Table
This table stores additional details specific to patients.
Column Name	Data Type	Description
patient_id	INT (PK, FK)	References user_id from the Users table.
date_of_birth	DATE	Patient's date of birth.
contact_number	VARCHAR(15)	Patient's contact number.
address	TEXT	Patient's address.
created_at	TIMESTAMP	Record creation timestamp.
updated_at	TIMESTAMP	Record update timestamp.



3. Doctors Table
This table stores additional details specific to doctors.
Column Name	Data Type	Description
doctor_id	INT (PK, FK)	References user_id from the Users table.
specialization_id	INT (FK)	References specialization_id from the Specializations table.
contact_number	VARCHAR(15)	Doctor's contact number.
availability	BOOLEAN	Indicates if the doctor is currently available.
free_time	VARCHAR(50)	Free time slots (e.g., '10 AM - 12 PM').
created_at	TIMESTAMP	Record creation timestamp.
updated_at	TIMESTAMP	Record update timestamp.

4. Appointments Table
This table stores the appointments booked by patients with doctors.
Column Name	Data Type	Description
appointment_id	INT (PK)	Primary key, unique ID for each appointment.
patient_id	INT (FK)	References patient_id from the Patients table.
doctor_id	INT (FK)	References doctor_id from the Doctors table.
appointment_date	DATE	Date of the appointment.
appointment_time	TIME	Time of the appointment.
status	ENUM('booked', 'completed', 'cancelled')	Appointment status.
created_at	TIMESTAMP	Record creation timestamp.
updated_at	TIMESTAMP	Record update timestamp.

5. Specializations Table
This table lists the specializations available for doctors.
Column Name	Data Type	Description
specialization_id	INT (PK)	Primary key, unique ID for each specialization.
specialization_name	VARCHAR(100)	Name of the specialization (e.g., Cardiologist, Pediatrician).
created_at	TIMESTAMP	Record creation timestamp.
updated_at	TIMESTAMP	Record update timestamp.

Relationships
1.	Users ↔ Patients: user_id in Users is referenced as patient_id in Patients.
2.	Users ↔ Doctors: user_id in Users is referenced as doctor_id in Doctors.
3.	Doctors ↔ Specializations: specialization_id in Specializations is referenced in Doctors.
4.	Appointments ↔ Patients and Doctors: patient_id references Patients, and doctor_id references Doctors.

