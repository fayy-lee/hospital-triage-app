CREATE TABLE patients (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    code CHAR(3) NOT NULL,
    severity INTEGER NOT NULL,
    wait_time VARCHAR(255)
);

-- Insert some sample data
INSERT INTO patients (name, code, severity, wait_time) VALUES
('John Doe', 'ABC', 1, '30 minutes'),
('Jane Smith', 'XYZ', 2, '45 minutes');
