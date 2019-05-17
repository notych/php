<!DOCTYPE html>
<head>
	<meta charset="utf-8"> 
	<title>Task7</title>
	
</head>
<body>
    <h1>Контактная форма</h1>
    <form method="POST">
		<label %NAME_STYLE% for="name">ФИО: %NAME_ERROR%</label><br>
        <input type="text" id="name" name="name" value="%NAME_VALUE%"><br>
        <label %EMAIL_STYLE% for="email">E-mail: %EMAIL_ERROR%</label><br>
        <input type="text" id="email" name="email"  value="%EMAIL_VALUE%"><br>
        <label %SUBJECT_STYLE% for="subject">Тема письма: %SUBJECT_ERROR%</label><br>
        <select id="subject" name = "typemessage">
            %SELECT%
        </select><br>
        <label %MESSAGE_STYLE% for="message">Сообщение: %MESSAGE_ERROR%</label><br>
        <textarea " id="message" name="message" rows="5">%MESSAGE_VALUE%</textarea><br>
        <button type="submit">Отправить</button>
     </form>
     <p>%MAIL%</p>
</body>
</html>
