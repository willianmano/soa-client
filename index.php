<!DOCTYPE html>
<html>
<head>
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/css/bootstrap-combined.min.css" rel="stylesheet">
</head>

<body>

<div id="users"></div>

<h1>Add user</h1>


<form id="addUser" class="form-horizontal">
  <fieldset>
    <legend>Adicionar Usuarios</legend>
    <label>Nome</label>
    <input type="text" name="user[login]" class="input-medium">
    <label>Senha</label>
    <input type="text" name="user[password]" class="input-medium">
  </fieldset>
</form>

<button class="btn btn-info" id="btAdduser">Add</buttton>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="js/library/RestClient.js"></script>
<script type="text/javascript" src="js/library/RpcClient.js"></script>
<script type="text/javascript">

    var apiKey = '85e4a615f62c711d3aac0e7def5b4903';

    $('#btAdduser').click(function() {

        data = ($('#addUser').serializeArray());
        console.log(data);
        var client = new RestClient(apiKey);
        var result = client.post('http://soa.dev/user', data);
        if (result.status == 'success') 
            showUsers();
        else
            alert('Error saving user - ' + result.data);

        return false;
    });

    function showUsers() {
        $("#users").empty();
        var client = new RestClient(apiKey);
        var result = client.get('http://soa.dev/teste');

        //console.log(client);
        // if (result.status == 'success') {
        //     data = result.data;
        //     $("#users").append('<p>'+data+'</p>');
        // }
    }

    $(document).ready(showUsers);
</script>
</body>
</html>