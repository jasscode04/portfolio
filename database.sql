-- ============================================================
-- JASPRIT PORTFOLIO — Database Schema
-- Import this file via phpMyAdmin or MySQL CLI
-- ============================================================

CREATE DATABASE IF NOT EXISTS `jasprit_portfolio`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `jasprit_portfolio`;

-- ------------------------------------------------------------
-- Table: contact_messages
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `contact_messages` (
  `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`       VARCHAR(120) NOT NULL,
  `email`      VARCHAR(255) NOT NULL,
  `message`    TEXT         NOT NULL,
  `ip_address` VARCHAR(45)  DEFAULT NULL,
  `created_at` DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- Table: projects (optional — portfolio uses PHP array by default)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `projects` (
  `id`             INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug`           VARCHAR(120) NOT NULL UNIQUE,
  `title`          VARCHAR(255) NOT NULL,
  `badge`          VARCHAR(80)  DEFAULT NULL,
  `description`    TEXT         DEFAULT NULL,
  `technology`     VARCHAR(500) DEFAULT NULL,
  `icon`           VARCHAR(80)  DEFAULT 'fa-code',
  `color`          VARCHAR(30)  DEFAULT 'blue',
  `github_url`     VARCHAR(500) DEFAULT NULL,
  `live_url`       VARCHAR(500) DEFAULT NULL,
  `case_study_url` VARCHAR(500) DEFAULT NULL,
  `sort_order`     TINYINT      DEFAULT 0,
  `created_at`     DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- Table: admin_users (optional, for future admin panel)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username`   VARCHAR(80)  NOT NULL UNIQUE,
  `password`   VARCHAR(255) NOT NULL,
  `created_at` DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- END OF SCHEMA
-- ============================================================
