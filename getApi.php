<?php   include_once "./connect.php"; ?>
<?php
$name_error="";
$chname="";


if(isset($_POST['submit'])){
    if(empty($_POST[$name])){
        $name_error="name is required";
    }else{
        $chname=strtolower($_POST[$chname]);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Return Page contents.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //grab URL and pass it to the variable.
        curl_setopt($ch, CURLOPT_URL, $Api_Url);

        $resultphp = curl_exec($ch);
        $resourse = json_decode($resultphp, true);

        curl_close($ch);
        // // get api with file_get_connects
        // $Api_Url = 'http://hp-api.herokuapp.com/api/characters/students';

        // $resourse=json_decode(file_get_contents($Api_Url));
        // // echo "<pre>";
        // // print_r($resourse);
        foreach ($resourse as $keys => $result){
            if(strtolower($result['name']) === $chname){
                $name=$result['name'];
                $gender=$result['gender'];
                $house=$result['house'];
                $ancestry=$result['ancestry'];
                $actor=$result['actor'];
            }
        }
    }
    if(!isset($name)){
        $name="no character with this name";
    }
    if(empty($name_error)){
        $statement = $PDO->prepare("SELECT * FROM hogwarts WHERE name LIKE :name_of_character");
        $statement->bindValue(':name_of_characters', $name);
        $statement->execute();
        $name_matched = $statement->fetchAll(PDO::FETCH_ASSOC);


        if(!$name_matched){
            $statement = $PDO->prepare("INSERT INTO hogwarts (name,gender,house,ancestry,actor)
            VALUES (:name_of_character, :gender_of_character,:house_of_character,:ancestry_of_character,:actor_of_character)");
            $statement->bindValue(':name_of_character',$name);
            $statement->bindValue(':gender_of_character',$gender);
            $statement->bindValue(':house_of_character',$house);
            $statement->bindValue(':ancestry_of_character',$ancestry);
            $statement->bindValue(':actor_of_character',$actor);
            $statement->execute();
            $statement=$PDO->prepare("SELECT * FROM hogwarts WHERE name LIKE :name_of_character");
            $statement->bindValue(':name_of_character', $name);
            $statement->execute();
            $name_matched = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            

        }
        var_dump($name_matched);
    }
}
?>