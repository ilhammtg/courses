#############################
MY PROJECT README DESCRIPTION
#############################

framework: codeigniter 3.1.11
database: mysql

if you use mariadb, you can replace utf8mb4_0900_ai_ci =>> utf8mb4_general_ci on "courses_db.sql"

****************
SITE DESCRIPTION
****************

"website for online courses"

situs ini memiliki 3 interface:
1. home
2. admin
3. user

-pada bagian home, user dapat melihat daftar course yang tersedia, dan dapat melakukan enroll pada course tersebut.
-pada bagian admin, admin dapat menambahkan course baru, mengedit course, dan menghapus course. admin juga dapat melihat daftar user yang telah enroll pada course. lalu addmin juga dapat melihat status payment dari user.
-pada bagian user, nantinya user dapat melihat daftar course yang telah di enroll, dan dapat mengikuti course tersebut. lalu akan mendapatkan sertrifikat jika telah menyelesaikan course tersebut. (masih dalam tahap pengembangan)

pada navbar home terdapat beberapa menu yaitu:
1. home
2. courses
3. about us
4. contact us

-button login akan mengredirect ke halaman yang nantinya ada 2 button yaitu login user dan login admin.
-untuk user dapat memilih course terlebih dahulu, lalu akan diarahkan ke halaman register, dan setelah register user dapat login, setelah login langsung diarahkan untuk melakukan pembayaran terlebih dahulu dengan cara mengupload bukti pembayaran. setelah itu user dapat mengikuti course yang telah di enroll.
-untuk admin, admin dapat login dan langsung diarahkan ke halaman admin, dimana admin dapat menambahkan course baru, mengedit course, menghapus course, melihat daftar user yang telah enroll pada course, dan melihat status payment dari user.


***************
KONTESK DIAGRAM
***************

+----------------------------------------+
|                Admin                   |
| - Mengelola data courses               |
| - Melihat user yang enroll             |
| - Melihat status pembayaran            |
+----------------+-----------------------+
                 |
                 |
                 v
+----------------------------------------+
|            Sistem Online Courses       |
+----------------+-----------------------+
                 |
                 |
+----------------+-----------------------+
|                User                    |
| - Melihat daftar courses               |
| - Enroll course                        |
| - Upload bukti pembayaran              |
| - Mengikuti course                     |
| - Mendapatkan sertifikat               |
+----------------------------------------+




****************************
            ERD
****************************

Users (user_id) ------< Enrollments (enrollment_id) >------ Courses (course_id)
           |                                          |
           |                                          |
      Payments (payment_id)                     Certificate Status




****************************
            EFD
****************************

+--------------+-------------------------------------------------------------+
| Entity       | Function                                                    |
+--------------+-------------------------------------------------------------+
| Users        | - Register, login, and logout.                              |
|              | - Enroll in courses.                                        |
+--------------+-------------------------------------------------------------+
| Admin        | - Add, edit, and delete courses.                            |
|              | - View list of enrolled users.                              |
|              | - Verify payment statuses.                                  |
+--------------+-------------------------------------------------------------+
| Courses      | - Store course details (e.g., name, description, price).    |
+--------------+-------------------------------------------------------------+
| Enrollments  | - Link between users and courses.                           |
|              | - Track payment and completion statuses.                    |
+--------------+-------------------------------------------------------------+
| Payments     | - Store payment proof and timestamps.                       |
|              | - Mark enrollments as paid or unpaid.                       |
+--------------+-------------------------------------------------------------+
| Certificate  | - Store certificate details.                                |
+--------------+-------------------------------------------------------------+
| Status       | - Track completion statuses.                                |
+--------------+-------------------------------------------------------------+




==============
ACCESS ACCOUNT
==============

===========================
=> admin:
email   : ilham@gmail.com 
password: 12345
***************************
=> user:
email   : rian@gmail.com
password: 123456

email   : syifa@gmail.com
password: 123456
===========================

