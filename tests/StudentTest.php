<?php

        /**
        * @backupGlobals disabled
        * @backupStaticAttributes disabled
        */

        require_once "src/Student.php";

        $server = 'mysql:host:localhost;dbname=registrar_test';
        $username = 'root';
        $password = 'root';
        $DB = new PDO($server, $username, $password);

        class StudentTest extends PHPUnit_Framework_TestCase
        {

            function test_save()
            {
                //arrange
                $student_name = "John Doe";
                $enrollment_date = "2015-09-01";
                $id = 1;
                $test_student = new Student($student_name, $enrollment_date, $id);
                $test_student->save();

                //act
                $result = Student::getAll();

                //assert
                $this->assertEquals($test_student, $result[0]);
            }

            function test_getAll()
            {
                //arrange
                $student_name = "John Doe";
                $enrollment_date = "2015-09-01";
                $id = 1;
                $test_student = new Student($student_name, $enrollment_date, $id);
                $test_student->save();

                $student_name2 = "Jane Doe";
                $enrollment_date2 = "2015-10-01";
                $id2 = 2;
                $test_student2 = new Student($student_name2, $enrollment_date2, $id2);
                $test_student2->save();

                //act
                $result = Student::getAll();

                //assert
                $this->assertEquals([$test_student, $test_student2], $result);
            }


        }
?>
