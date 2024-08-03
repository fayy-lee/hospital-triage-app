-- Creating tables
CREATE TABLE patients (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100),
    code CHAR(3),
    severity INT,
    wait_time INT
);

CREATE TABLE admins (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);


CREATE TABLE wait_times (
    id SERIAL PRIMARY KEY,
    patient_id INT REFERENCES patients(id),
    wait_time INT,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Inserting sample data
INSERT INTO patients (name, code, severity, wait_time) VALUES
('Alice Smith', 'ASM', 2, 30),
('Bob Johnson', 'BJN', 5, 60),
('Carol White', 'CWH', 3, 45),
('David Brown', 'DBR', 4, 50),
('Eva Green', 'EGR', 1, 20),
('Frank Black', 'FBL', 3, 40),
('Grace Lee', 'GLE', 2, 25),
('Hank Wood', 'HWD', 5, 70),
('Ivy Stone', 'IST', 4, 55),
('Jack Hill', 'JHL', 3, 35);

-- Insert sample data into admins table
INSERT INTO admins (username, password) VALUES
('admin1', 'pass1'), 
('admin2', 'pass2'), 
('admin3', 'pass3'), 
('admin4', 'pass4'), 
('admin5', 'pass5'), 
('admin6', 'pass6'), 
('admin7', 'pass7'), 
('admin8', 'pass8'), 
('admin9', 'pass9'), 
('admin10', 'pass10'); 

-- Insert sample data into wait_times table
INSERT INTO wait_times (patient_id, wait_time) VALUES
(1, 30),
(2, 60),
(3, 45),
(4, 50),
(5, 20),
(6, 40),
(7, 25),
(8, 70),
(9, 55),
(10, 35);