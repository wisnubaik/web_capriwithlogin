<?php
$notes = [];
if (file_exists('notes.json')) {
    $notes = json_decode(file_get_contents('notes.json'), true);
}

$title = '';
$content = '';
$id = -1;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    if ($id >= 0) {
        // Edit existing note
        $notes[$id]['title'] = $title;
        $notes[$id]['content'] = $content;
    } else {
        // Add new note
        $note = [
            'title' => $title,
            'content' => $content
        ];
        $notes[] = $note;
    }

    file_put_contents('notes.json', json_encode($notes));
    header('Location: index.php');
    exit();
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($notes[$id])) {
        $title = $notes[$id]['title'];
        $content = $notes[$id]['content'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simpan Catatan</title>
</head>
<body>
    <form action="save_note.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="title">Judul:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required><br>
        <label for="content">Konten:</label>
        <textarea id="content" name="content" required><?php echo htmlspecialchars($content); ?></textarea><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>