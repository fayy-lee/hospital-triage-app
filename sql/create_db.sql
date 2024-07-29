-- Create the database
CREATE DATABASE hospital_triage;

-- Connect to the database
\c hospital_triage;

-- Create the patients table
CREATE TABLE patients (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    severity VARCHAR(10) NOT NULL,
    code VARCHAR(3) NOT NULL,
    arrival_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
