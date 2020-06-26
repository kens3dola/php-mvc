<div style="
        position: absolute;
  background: url(/php-mvc/public/image/rest.jpg);
  background-size: cover;
    width: 100%;
    min-height: 30vh;
    max-height: 30%;
    top: 0;
    left: 0;
    z-index:-9999;">
</div>
<div class="container-fluid" style="position:absolute; top:30%; height:70%; background-color: white; color:black">

        <h1 class="text-center">Reservation form</h1>
        <form class="profile_form" style="margin: auto" action="/php-mvc/order/reservation" method="POST">

                <div class="form-group">
                        <label for="">*Date:</label>
                        <input type="date" class="form-control" name="date">
                </div>
                <div class="form-group">
                        <label for="">*Time:</label>
                        <select class="form-control" name="time">
                                <option value="13">1PM</option>
                                <option value="14">2PM</option>
                                <option value="15">3PM</option>
                                <option value="16">4PM</option>
                                <option value="17">5PM</option>
                                <option value="18">6PM</option>
                                <option value="19">7PM</option>
                                <option value="20">8PM</option>
                        </select>
                </div>
                <div class="form-group">
                        <label for="">*Duration(hours):</label>
                        <input type="number" class="form-control" name="duration">
                </div>
                <div class="form-group">
                        <label for="">*Guest number:</label>
                        <input type="number" class="form-control" name="guest">
                </div>
                <button type="submit" class="btn btn-danger">Submit request</button>
        </form>

</div>