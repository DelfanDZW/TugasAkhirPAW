<?php
class CharacterModel extends Model
{

    public function getAll()
    {
         $sql = 'SELECT * FROM characters ORDER BY id DESC';
         return $this->mysqli->query($sql);
    }

    public function insert($name, $image, $tags, $description) {
     $stmt = $this->mysqli->prepare("INSERT INTO characters (name, image, tags, description) VALUES (?, ?, ?, ?)");
     $stmt->bind_param('ssss', $name, $image, $tags, $description);
 
     return $stmt->execute();
 }
 
     public function getById($id)
     {
          $stmt = $this->mysqli->prepare("SELECT * FROM characters WHERE id = ?");
          $stmt->bind_param("i", $id);
          $stmt->execute();
          return $stmt->get_result();
     }

     public function getByTags()
     {
          $sql = 'SELECT tags FROM characters';
          return $this->mysqli->query($sql);
     }

     public function update($id, $name, $image, $tags, $description,)
     {
          if ($image === null) {
               $stmt = $this->mysqli->prepare(
                    "UPDATE characters SET 
                name = ?, 
                 tags = ?, 
                description = ?, 
            WHERE id = ?"
               );

               $stmt->bind_param(
                "sss",
                $name,
                $tags,
                $description,
               );
          } else {
            $stmt = $this->mysqli->prepare(
                "UPDATE characters SET 
            name = ?, 
            image = ?, 
            tags = ?, 
            description = ? 
        WHERE id = ?"
           );

           $stmt->bind_param(
            "ssssi",
            $name,
            $image,
            $tags,
            $description,
            $id
           );
          }

          $stmt->execute();
     }

     public function delete($id)
     {
          $imagePath = null;
          $stmt = $this->mysqli->prepare("SELECT image FROM characters WHERE id = ?");
          $stmt->bind_param("i", $id);
          $stmt->execute();
          $stmt->bind_result($imagePath);
          $stmt->fetch();
          $stmt->close();

          $stmt = $this->mysqli->prepare("DELETE FROM characters WHERE id = ?");
          $stmt->bind_param("i", $id);

          if ($stmt->execute()) {
               if ($imagePath && file_exists($imagePath))
                    unlink($imagePath);

               header("Location: ?c=Character");
          } else
               header("Location: ?c=Character");

          $stmt->close();
     }
}