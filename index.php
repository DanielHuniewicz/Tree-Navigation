<?php 
include "db_connection.php";
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Obsluga drzewa nawigacji</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
  <style>
  </style>
 </head>
 <body>
  <br /><br />

  <!-- Div głowny w ktorym są formy -->
  <div class="container" style="width:1000px;">
   <h1 align="center">Obsługa drzewa nawigacji</h1>
   <br /><br />
   <div class="row">

<!-- Div z dodawaniem -->
    <div class="col-md-6">
        <div>
        <h3 align="center">Dodaj nowy obiekt</h3>
        <br />
        <form method="post" id="treeview_form">
          <div class="form-group">
          <label>Wybierz rodzica</label>
          <select name="parent_id" id="parent_id" class="form-control">
          </select>
          </div>
          <div class="form-group">
          <label>Wpisz nazwe</label>
          <input type="text" name="object_name" id="object_name" class="form-control">
          </div>
          <div class="form-group">
          <input type="submit" name="action" id="action" value="Dodaj" class="btn btn-primary"/>
          </div>
        </form>
      </div>

<!-- Div z usuwaniem -->
    <div class="col-md-6">
     <h4 align="center">Usuń obiekt</h4>
     <br />
     <form method="post" id="treeview_form2">
      <div class="form-group">

      <div class="form-group">
       <label>Wpisz nazwe</label>
       <input type="text" name="name" id="category_name" class="form-control">
      </div>
      <div class="form-group">
       <input type="submit" name="action" id="action" value="Usun" class="btn btn-primary"/>
      </div>
      </div>
     </form>
    </div>

    <!-- Div z edycja rodzica -->
    <div class="col-md-6">
     <h4 align="center">Edytuj położenie</h4>
     <br />
     <form method="post" id="treeview_form3">
      <div class="form-group">
       <label>Wybierz rodzica</label>
       <select name="parent_id2" id="parent_id2" class="form-control">
          </select>
      </div>
      <div class="form-group">
       <label>Wpisz nazwe</label>
       <input type="text" name="child" id="category_name" class="form-control">
      </div>
      <div class="form-group">
       <input type="submit" name="action" id="action" value="Edytuj" class="btn btn-primary"/>
      </div>
     </form>
    </div>
    </div>

<!-- Div z wyswietleniem -->
    <div class="col-md-6">
     <h3 align="center">Wyświetlenie drzewa</h3>
     <br />
     <div id="treeview"></div>
    </div>
   </div>
  </div>
  
 </body>
</html>

<script>

$(document).ready(function(){

  //funkcje wykonywane na starcie
  parent_name_fill();
  load_tree();
  
  function load_tree()
  {
    $.ajax({
      url:"dispatch.php",
      dataType:"json",
      success:function(data){
        $('#treeview').treeview({
          data:data
        });
      }
    })
  }

  // funkcja ladujaca formularz nazwami rodzicow
  function parent_name_fill()
  {
    $.ajax({
      url:'parent_name_fill.php',
      success:function(data){
        $('#parent_id').html(data); 
        $('#parent_id2').html(data);   
      }
    });
  }

  // funkcja dodająca nowy obiekt
  $('#treeview_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"add.php",
      method:"POST",
      data:$(this).serialize(),
      success:function(data){
        load_tree();
        parent_name_fill(); 
        $('#treeview_form')[0].reset();
        alert(data);
      }
    })
  });

  //funkcja usuwania obiektu po nazwie
  $('#treeview_form2').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"delete.php",
      method:"POST",
      data:$(this).serialize(),
      success:function(data){
        load_tree();
        parent_name_fill();
        $('#treeview_form')[0].reset();
        alert(data);
      }
    })
  });

  // funkcja edycji rodzica obiektu
  $('#treeview_form3').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"edit.php",
      method:"POST",
      data:$(this).serialize(),
      success:function(data){
        load_tree();
        parent_name_fill();
        $('#treeview_form')[0].reset();
        alert(data);
      }
    })
  });

});
</script>

