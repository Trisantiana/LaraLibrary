<!DOCTYPE html>
<html>
<head>
    <title>Penerbit Print Preview</title>
    <link href="{{ mix('/css/all.css') }}" rel="stylesheet" type="text/css" />

</head>
<body>
    <div class="box">
            <div class="box-header">
                <center>
                <h3 class="box-title"> DATA PENERBIT</h3>
                </center>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                        <tr>
                            <th width="5">No</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penerbits as $key => $penerbit)
                            <tr>
                                <td> {{ ($key+1) }} </td>
                                <td> {{ ($penerbit->penerbit) }} </td>
                                <td> {{ ($penerbit->thn_terbit) }} </td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>

            </div>
        </div>

</body>
</html>