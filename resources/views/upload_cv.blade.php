
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div >
        <!-- Formulaire d'upload de CV -->
        <form method="POST" action="" enctype="multipart/form-data">
            @csrf
            <input type="file" name="cv" accept=".pdf, .doc, .docx">
            <button type="submit">Envoyer CV</button>
        </form>
    </div>
    
</body>
</html>


