<?php
class Character extends Controller
{
   public function index()
   {
      $characterModel = $this->loadModel('CharacterModel');
      $characters = $characterModel->getAll();
      $tags = $characterModel->getByTags();
      $this->loadView('admin_dashboard', ['characters' => $characters, 'tags' => $tags]);
   }

   public function detail(): void
   {
      $id = $_GET['id'];

      if (!$id)
         header('Location: ?c=Character');

      $characterModel = $this->loadModel('CharacterModel');
      $character = $characterModel->getById($id);

      if (!$character->num_rows)
         header('Location: ?c=Character');

      $this->loadView('character_detail', ['character' => $character->fetch_object()]);
   }

   private function handlePosterUpload(): string
{
    $defaultImage = 'default.jpg'; // Default image jika tidak ada upload

    if (isset($_FILES['uploadedfile']) && $_FILES['uploadedfile']['error'] !== UPLOAD_ERR_NO_FILE) {
        $target_path = "img/" . basename($_FILES['uploadedfile']['name']);

        if ($_FILES['uploadedfile']['error'] === UPLOAD_ERR_OK && move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
            return basename($_FILES['uploadedfile']['name']);
        } else {
            echo "<script>alert('Gagal mengunggah file.');</script>";
        }
    }

    return $defaultImage;
}

public function create()
{
    try {
        $name = $_POST['name'];
        $tags = isset($_POST['tags']) ? implode(', ', $_POST['tags']) : '';
        $description = $_POST['description'];
        $image = $this->handlePosterUpload();

        $model = new CharacterModel();
        if ($model->insert($name, $image, $tags, $description)) {
            header('Location: ?c=Character');
        } else {
            throw new Exception("Gagal menyimpan data.");
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}


   public function edit_form(): void
   {
      $id = $_GET['id'];

      if (!$id)
         header('Location: ?c=Character');

      $characterModel = $this->loadModel('CharacterModel');
      $character = $characterModel->getById($id);

      if (!$character->num_rows)
         header('Location: ?c=Character');

      $this->loadView('edit_character', ['character' => $character->fetch_object()]);
   }

   public function update()
    {
    $characterModel = $this->loadModel('CharacterModel');
    $id = $_POST['id'];
    $name = $_POST['name'];
    $tags = isset($_POST['tags']) ? implode(', ', $_POST['tags']) : ''; 
    $description = $_POST['description'];
    $image = $this->handlePosterUpload();

    $characterModel->update($id, $name, $image, $tags, $description);
    header('Location: ?c=Character');
    }



   public function delete()
   {
      $id = $_GET['id'];

      $characterModel = $this->loadModel('CharacterModel');
      $characterModel->delete($id);

      header('location:?c=Character');
   }
}