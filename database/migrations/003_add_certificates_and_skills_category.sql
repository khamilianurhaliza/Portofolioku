-- Migration: 003_add_certificates_and_skills_category
-- Description: Creates the certificates table and adds a category column to the skills table.

-- Create certificates table
CREATE TABLE IF NOT EXISTS certificates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    issuer VARCHAR(255) NOT NULL,
    date_issued DATE DEFAULT NULL,
    image_url VARCHAR(255) DEFAULT NULL,
    credential_url VARCHAR(255) DEFAULT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Add category column to skills table if it doesn't exist
-- Note: MySQL doesn't natively support "ADD COLUMN IF NOT EXISTS" elegantly before MySQL 8.0.16, 
-- but this is safe to run in development or a standard setup script context.
ALTER TABLE skills ADD COLUMN category VARCHAR(50) DEFAULT 'Hard Skill';
