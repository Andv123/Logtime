<table>
    <tr>
        <td colspan="4">Over time</td>
    </tr>
    <thead>
        <tr>
            <th>Stt</th>
            <th>Username</th>
            <th>Email</th>
            <th>Total OT</th>
        </tr>
    </thead>
    <tbody>
    <?php $i = 1; ?>
    @foreach($overtime as $ot)
        <tr>
            <td>{{$i}}</td>
            <td>{{$ot['name']}}</td>
            <td>{{$ot['email']}}</td>
            <td>{{$ot['overtime']}}</td>
        </tr>
        <?php $i++; ?>
    @endforeach
    </tbody>
</table>
