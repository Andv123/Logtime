<table>
    <tr>
        <td colspan="4">Off time</td>
    </tr>
    <thead>
    <tr>
        <th>Stt</th>
        <th>Username</th>
        <th>Email</th>
        <th>Total Off</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1; ?>
    @foreach($attendence as $att)
        <tr>
            <td>{{$i}}</td>
            <td>{{$att['name']}}</td>
            <td>{{$att['email']}}</td>
            <td>{{$att['attendence']}} (hours)</td>
        </tr>
        <?php $i++; ?>
    @endforeach
    </tbody>
</table>
