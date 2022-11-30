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

<h1>Liste Des posts Disponibles</h1>

<table id="customers">
  <tr>
    <th>Nom post</th>
    <th>Catégorie</th>
    <th>Description</th>
    <!-- <th>Image</th> -->
  </tr>
  @if (count($posts))
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->name }}</td>
                       
                         
                        <td>{{ $post->CategoryA->name }}</td>
                         
                        <td>{{ $post->content }}</td>

                        <!-- <td><img src="/coverpost/{{ $post->image }}" alt="" style="max-width: 80px; border-radiu: 100px"></td> -->
                @endforeach
  @else
  <tr>
    <td>No posts found</td>
  </tr>
  @endif
  </table>
</body>
</html>


