<!DOCTYPE html>
<html>
  <head>
    <style>
    html * {
      font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif !important;
    }
    h1 {
      color: #1a5276;
      background-color: #d2b4de;
      text-align: center;
      padding: 6px;
    }
    thead {
      display: table-header-group;
    }
    #products {
      font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    #products td, #products th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    #products tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    #products tr:hover {
      background-color: #ddd;
    }
    #products th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #a569bd;
      color: white;
    }
    </style>
  </head>

  <body>
    <h1>Reservation aux evenements</h1>
    <table id='products'>
    <thead>
                <tr>
                <th>Evenement</th>
                  <th>Nb place</th>
                  <th>client</th>
                  <th>Date de réservation</th>
                </tr>
              </thead>
     
              @if (count($ReservationEvenement))                
              
              @foreach ($ReservationEvenement as $item)


                <tr>

                    <td>{{ $item->evenementRv->title }}</td>

                    <td>{{ $item->nb_place }}</td>

                    <td>{{ $item->user }}</td>

                    <td> {{ date('d-m-Y', strtotime($item->created_at))}}</td>

            


                </tr>
                  @endforeach
                  @else
  <tr>
    <td>No reservations found</td>
  </tr>
  @endif
    </table>
  </body>
</html>






