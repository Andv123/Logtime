<table>
    <tr>
        <td colspan="6" style="text-align: center; font-weight: bold">List user</td>
    </tr>
    <thead>
        <tr>
            <th>Stt</th>
            <th>Username</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Position</th>
            <th>Phone number</th>
        </tr>
    </thead>
    <tbody>
    <?php $i = 1; ?>
    @foreach($user as $us)
        <tr>
            <td>{{$i}}</td>
            <td>{{$us->user_name}}</td>
            <td>{{$us->full_name}}</td>
            <td>{{$us->email}}</td>
            <td>{{$us->position}}</td>
            <td>
                <?php
                if (isset($us->phone_number)) {
                    echo "0".$us->phone_number;
                } else {
                    echo "";
                }
                ?>
            </td>
        </tr>
        <?php $i++; ?>
    @endforeach
    </tbody>
</table>
