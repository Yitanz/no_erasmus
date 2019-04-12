<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="../public/semantic.min.css" />
  <title>10_Vuex_App</title>
  <style>
    .ui.container {
      margin: 20px 0;
    }
    .input-form {
      max-width: 500px;
    }
  </style>
</head>

<body>
  <div id="app" class="ui container">
    <h2 class="ui header">Fullstack Clothing Inquiry Sheet</h2>
    <input-form></input-form>
  </div>

  <script src="https://unpkg.com/vue"></script>
  <script src="https://unpkg.com/vuex"></script>
  <script src="{{ asset('js/store.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
