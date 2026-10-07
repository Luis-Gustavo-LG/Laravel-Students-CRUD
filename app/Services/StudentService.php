<?php
    namespace app\Services;

    use App\Models\Student;
    use Illuminate\database\Eloquent\Collection;
    use Illuminate\Pagination\LengthAwarePaginator;

    class StudentService
    {
        public function createStudent(array $data): Student
        {
            return Student::create($data);
        }

        public function getAllStudents(): LengthAwarePaginator
        {
            return Student::latest()->paginate(10);
        }

        public function getStudentById(string $id): ?Student
        {
            return Student::findOrFail($id);
        }

        public function updateStudent(string $id, array $data): bool
        {
            $student = Student::findOrFail($id);
            return $student->update($data);
        }

        public function deleteStudent(string $id): bool
        {
            $student = Student::findOrFail($id);
            return $student->delete();
        }
    }
?>