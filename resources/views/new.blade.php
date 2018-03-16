<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <div>
        <div>
            Name:
            <input type="text" name="name" id="nameText" />
        </div>
        <div>
            Pass:
            <input type="text" name="pass" id="passText" />
        </div>
        <input type="button" onclick="refresh()" value="send" />
    </div>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">
    let model = {
        username: 'mojdeh',
        password: '123'
    };

    updateUI();

    function loadData() {
        axios.get('new/data')
            .then(function(res) {
                model.username = res.data.username;
                model.password = res.data.password;

                updateUI();
            });
    }

    function refresh() {
        loadData();
    }

    function updateUI() {
        let name1 = document.getElementById('nameText');
        let pass1 = document.getElementById('passText');

        name1.value = model.username;
        pass1.value = model.password;
    }
    </script>
</body>

</html>
