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

<h1>Liste Des participants Disponibles</h1>

<table id="customers">
  <tr>
  <th>Nom </th>
                  <th>Prenom </th>
                  <th>Mail </th>
                  <th>Etat Physique</th>                  
                  <th>num </th>
                  <th>Age </th>
                  <th>Balade </th>
    <!-- <th>Image</th> -->
  </tr>
  @if (count($participants))
                @foreach ($participants as $participants)
                    <tr>
                    <td>{{ $participants->NomParticipant }}</td>

<td>{{ $participants->PrenomParticipant }}</td>

<td>{{ $participants->MailParticipant }}</td>

<td>{{ $participants->EtatPhysique }}</td>

<td>{{ $participants->numParticipant }}</td>

<td>{{ $participants->AgeParticipant }}</td>

<td>{{ $participants->balade->titleBalade }}</td>

    @endforeach
  @else
  <tr>
    <td>No posts found</td>
  </tr>
  @endif
  </table>
</body>
</html>


