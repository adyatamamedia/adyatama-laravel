<?php
$file = 'C:\xampp\htdocs\adyatama-school2\dash\app\Controllers\Admin\GuruStaff.php';
$content = file_get_contents($file);

// Replace the bulkDelete function completely
$newBulkDelete = '    public function bulkDelete()
    {
        helper(\'auth\');

        $ids = $this->request->getPost(\'ids\');
        if (!$ids || !is_array($ids)) {
            return redirect()->back()->with(\'error\', \'No guru/staff selected.\');
        }

        $count = 0;
        foreach ($ids as $id) {
            if ($this->guruStaffModel->delete($id)) {
                log_activity(\'bulk_delete_guru_staff\', \'guru_staff\', $id);
                $count++;
            }
        }

        return redirect()->to(\'/dashboard/guru-staff\')->with(\'message\', "$count guru/staff deleted successfully.");
    }
}';

// Find the start of bulkDelete function
$startPos = strpos($content, '    public function bulkDelete()');
if ($startPos !== false) {
    // Find the end of the class (should be just after bulkDelete)
    $endPos = strrpos($content, '}');

    if ($endPos !== false) {
        // Replace from bulkDelete start to class end
        $newContent = substr($content, 0, $startPos) . $newBulkDelete;
        file_put_contents($file, $newContent);
        echo "Fixed bulkDelete function in GuruStaff.php";
    } else {
        echo "Could not find class end";
    }
} else {
    echo "Could not find bulkDelete function";
}
?>