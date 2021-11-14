<!DOCTYPE html>
<html lang="pt_BR">

<head>
    
    
    <!-- <link rel="stylesheet" href="../css/estilo_formulario.css"> -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/app_formulario.js"></script>
   
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro Motorista</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/img/logos/360-degrees-svgrepo-com.svg" />

  <link rel="stylesheet" href="/css/formulario.css">
  <style>
    :root {
      --succes-color: #2ecc71;
      ;
      --error-color: #e74c3c;
    }

    .container {
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
      width: 400px;
      margin: 10px auto;
    }

    h2 {
      text-align: center;
      margin: 0 0 20px;
    }

    .form {
      padding: 30px 40px;
    }

    .form-control {
      margin-bottom: 10px;
      padding-bottom: 20px;
      position: relative;
    }

    .form-control label {
      color: #777;
      display: block;
      margin-bottom: 5px;
    }

    .form-control input {
      border: 2px solid #f0f0f0;
      border-radius: 4px;
      display: block;
      width: 100%;
      padding: 10px;
      font-size: 14px;
    }

    .form-control input:focus {
      outline: 0;
      border-color: #777;

    }

    .form-control.success input {
      border-color: var(--succes-color);
    }

    .form-control.error input {
      border-color: var(--error-color);
    }

    .form-control small {
      color: var(--error-color);
      position: absolute;
      bottom: 0;
      left: 0;
      visibility: hidden;
    }

    .form-control.error small {
      visibility: visible;
    }

    .form button {
      cursor: pointer;
      background-color: #3498db;
      border: 2px solid #3498db;
      border-radius: 4px;
      color: #fff;
      display: block;
      padding: 10px;
      font-size: 16px;
      margin-top: 20px;
      width: 100%;
    }
  </style>
</head>

<body>

  <main>
  <img id="img_logo" src="/img/logo_site_360.jpg">
    <div class="container">
      <form id="form" class="form">
        <h2>Cadastro</h2>
        <div class="form-control">
          <label for="text">Nome</label>
          <input type="text" id="nome" placeholder="Digite seu nome">
          <small>Error Message</small>
        </div>
        <div class="form-control">
          <label for="text2">Sobrenome</label>
          <input type="text" id="sobrenome" placeholder="Digite seu sobrenome">
          <small>Error Message</small>
        </div>
        <div class="form-control">
          <label for="number">CNH</label>
          <input type="number" id="cnh" placeholder="Digite o número de registro de sua CNH">
          <small>Error Message</small>
        </div>
        <div class="form-control">
          <label for="email">Categoria</label>
          <input type="text" id="cnh2" placeholder="Categoria da habilitação">
          <small>Error Message</small>
        </div>
        <div class="form-control">
          <label for="email">Validade</label>
          <input type="date" id="cnh3" placeholder="Validade da CNH">
          <small>Error Message</small>
        </div>
        <div class="form-control">
          <label for="email">Telefone</label>
          <input type="tel" id="tel" placeholder="Digite seu número">
          <small>Error Message</small>
        </div>
        <div class="form-control">
          <label for="email">Envie sua foto</label>
          <input type="file" id="foto">
          <small>Error Message</small>
        </div>
        <div class="form-control">
          <label for="email">Email</label>
          <input type="email" id="email" placeholder="Digite seu email">
          <small>Error Message</small>
        </div>
        <div class="form-control">
          <label for="password">Senha</label>
          <input type="password" id="password" placeholder="Digite sua senha">
          <small>Error Message</small>
        </div>
        <div class="form-control">
          <label for="password2">Confirme sua senha</label>
          <input type="password" id="password2" placeholder="Digite sua senha">
          <small>Error Message</small>
        </div>
        <button>Enviar</button>

      </form>
    </div>
  </main>

  <footer class="credit">Copyright &copy; Bite Treechnology 2021</footer>
  <script>
    const form = document.getElementById('form');
    const username = document.getElementById('text' + 'text2');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const password2 = document.getElementById('password2');

    //Show input error messages
    function showError(input, message) {
      const formControl = input.parentElement;
      formControl.className = 'form-control error';
      const small = formControl.querySelector('small');
      small.innerText = message;
    }

    //show success colour
    function showSucces(input) {
      const formControl = input.parentElement;
      formControl.className = 'form-control success';
    }

    //check email is valid
    function checkEmail(input) {
      const re =
        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (re.test(input.value.trim())) {
        showSucces(input)
      } else {
        showError(input, 'Email is not invalid');
      }
    }


    //checkRequired fields
    function checkRequired(inputArr) {
      inputArr.forEach(function (input) {
        if (input.value.trim() === '') {
          showError(input, `${getFieldName(input)} is required`)
        } else {
          showSucces(input);
        }
      });
    }


    //check input Length
    function checkLength(input, min, max) {
      if (input.value.length < min) {
        showError(input, `${getFieldName(input)} must be at least ${min} characters`);
      } else if (input.value.length > max) {
        showError(input, `${getFieldName(input)} must be les than ${max} characters`);
      } else {
        showSucces(input);
      }
    }

    //get FieldName
    function getFieldName(input) {
      return input.id.charAt(0).toUpperCase() + input.id.slice(1);
    }

    // check passwords match
    function checkPasswordMatch(input1, input2) {
      if (input1.value !== input2.value) {
        showError(input2, 'Passwords do not match');
      }
    }


    //Event Listeners
    form.addEventListener('submit', function (e) {
      e.preventDefault();

      checkRequired([name, email, password, password2]);
      checkLength(username, 3, 15);
      checkLength(password, 6, 25);
      checkEmail(email);
      checkPasswordMatch(password, password2);
    });
  </script>
</body>

</html>