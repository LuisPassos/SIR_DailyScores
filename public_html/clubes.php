<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DailyScores</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <script src="js/jquery-2.1.4.js"></script>

    <script>
      $(document).ready(function(){
          getClube();
          getJogadores();
      });

    function getClube(){
      $.ajax('http://api.football-data.org/alpha/teams/' + <?php echo $_GET["numero_clube"] ?> + '',{
        headers: { 'X-Auth-Token' : 'X' },
        dataType: 'json',
        type: 'GET',
        success : showdata,

      });
        }

    function getJogadores(){
      $.ajax('http://api.football-data.org/alpha/teams/' + <?php echo $_GET["numero_clube"] ?> + '/players',{
        headers: { 'X-Auth-Token' : 'X' },
        dataType: 'json',
        type: 'GET',
        success : showplayers,

      });
        }

    function showdata(data) {
      console.log(data);
      var nome_clube = $("<p/>").html(data.name);
      $("#clube").append(nome_clube);

      var foto = $("<img/>").attr("src", data.crestUrl);
      var valor_total = $("<p/>").html("Valor da Equipa: " + data.squadMarketValue);
      $("#clube-atual").append(foto);
      $("#clube-atual").append(valor_total);
    }

    function showplayers(jogadores) {
      console.log(jogadores);
            var tabela = $("<table/>").addClass("table table-bordered");
            var t = $("<tr/>");
            tabela.append(t);
            var td2 = $("<td/>").html("N");
            var td3 = $("<td/>").html("Nome");
            var td4 = $("<td/>").html("Valor");
            var td5 = $("<td/>").html("Nacionalidade");
            var td6 = $("<td/>").html("Posição");
            t.append(td2);
            t.append(td3);
            t.append(td4);
            t.append(td5);
            t.append(td6);
      for(i = 0; i < jogadores.players.length; i++) {
            var tr = $("<tr/>");
            tabela.append(tr);
            var td7 = $("<td/>").html(jogadores.players[i].jerseyNumber);
            var td8 = $("<td/>").html(jogadores.players[i].name);
            var td9 = $("<td/>").html(jogadores.players[i].marketValue);
            var td10 = $("<td/>").html(jogadores.players[i].nationality);
            var td11 = $("<td/>").html(jogadores.players[i].position);
            tr.append(td7);
            tr.append(td8);
            tr.append(td9);
            tr.append(td10);
            tr.append(td11);
      }
      $("#jogadores-clube").append(tabela);
    }

    </script>

  </head>
  <body>
<div class="container">
  <div class="header">
      <a href="index.html"><img src="images/logo.png"></img></a>
  </div>

<div class="main">
  <div class="row">
    <div class="container-fluid">
        <div class="col-md-3 menu">
          <p id="camp">Campeonatos</p>
          <hr>
        <ul class="nav nav-pills nav-stacked">
        <li><a href="portugal.html"><img src="images/bandeiras/pt.png" class="img-circle"> Liga NOS</img></a><p></p></li>
        <li><a href="espanha.html"><img src="images/bandeiras/esp.png" class="img-circle"> Liga BBVA</img></a><p></p></li>
        <li><a href="italia.html"><img src="images/bandeiras/it.png" class="img-circle"> Série A TIM</img></a><p></p></li>
        <li><a href="alemanha.html"><img src="images/bandeiras/gr.png" class="img-circle"> Bundesliga</img></a><p></p></li>
        <li><a href="inglaterra.html"><img src="images/bandeiras/uk.png" class="img-circle"> Barclays Premier League</img></a><p></p></li>
               </ul>
        </div>
        <div class="col-md-9">
          <div class="container-fluid">
            <div class="titulo" id="clube">

        </div>

        <div id="clube-atual">

        </div>

        <div id="jogadores-clube">

        </div>
        </div>
        </div>
        </div>
  </div>
</div>


<div class="footer">
  <p id="copyright">&copy; 2015 - Carlos Carvalho &amp; Luis Passos.</p>
  </div>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
