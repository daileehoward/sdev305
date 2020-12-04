<!--
    CREATE TABLE guestbook
    (
        submission_id INT(10) NOT NULL AUTO_INCREMENT,
        submission_date DATETIME NOT NULL DEFAULT NOW().
        first_name VARCHAR(30) NOT NULL,
        last_name VARCHAR(30) NOT NULL,
        job_title VARCHAR(50) NULL,
        company VARCHAR(50) NULL,
        linked_in VARCHAR(80) NULL,
        email VARCHAR(50) NULL,
        meeting_event VARCHAR(30) NOT NULL,
        message VARCHAR(300) NULL,
        mailing_list CHARACTER(1) NOT NULL,
        PRIMARY KEY (submission_id)
    );
-->