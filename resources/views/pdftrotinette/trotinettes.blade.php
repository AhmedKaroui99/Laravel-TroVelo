<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Liste Des Trotinettes Disponibles</h1>

<table id="customers">
  <tr>
    <th>Nom Trotinette</th>
    <th>Catégorie</th>
    <th>Vitesse</th>
     <th>Poids</th>
    <th>Couleur</th>
    <th>Prix</th>
     <th>Prix_Loaction</th>
    <th>Quantité</th>
    <!-- <th>Image</th> -->
  </tr>
  @if (count($trotinettes))
                @foreach ($trotinettes as $trotinette)
                    <tr>
                        <td>{{ $trotinette->nom }}</td>
                       
                         
                        <td>{{ $trotinette->categoryT->type }}</td>
                         
                        <td>{{ $trotinette->vitesse }}</td>
                        <td>{{ $trotinette->poids }}</td>
                        <td>{{ $trotinette->couleur }}</td>
                        <td>{{ $trotinette->prix }}</td>
                        <td>{{ $trotinette->prix_location }}</td>
                        <td>{{ $trotinette->quantite }}</td>
                        <!-- <td><img src="/coverTrotinette/{{ $trotinette->image }}" alt="" style="max-width: 80px; border-radiu: 100px"></td> -->
                @endforeach
  @else
  <tr>
    <td>No trotinettes found</td>
  </tr>
  @endif
  </table>
</body>
</html>


