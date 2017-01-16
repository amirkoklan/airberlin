<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Amir Booking System</title>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <style type="text/css">
            .search-form {
                margin-bottom: 30px;
            }
            td,th {
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <form class="search-form">
                <div class="form-group">
                    <label for="departure">Departure</label>
                    <select class="form-control" name="departure" id="departure">   
                        <?php foreach ($departures as $depature): ?>
                            <option value="<?php echo $depature; ?>"><?php echo $depature; ?></option>
                        <?php endforeach; ?>  
                    </select>
                </div>
                <div class="form-group">
                    <label for="departure">Departure</label>
                    <select class="form-control" name="destination">   
                        <?php foreach ($destinations as $destination): ?>
                            <option value="<?php echo $destination; ?>"><?php echo $destination; ?></option>
                        <?php endforeach; ?>  
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <?php if ($searchResults): ?>
                <table class="table-hover table-striped">
                    <tr>
                        <th>id</th>
                        <th>departure</th>
                        <th>destination</th>
                        <th>Booking Date - FROM</th>
                        <th>Booking Date - To</th>
                        <th>Flight Date - FROM</th>
                        <th>Flight Date - To</th>
                        <th>Amount</th>
                    </tr>
                    <?php foreach ($searchResults as $searchResult): ?>
                        <tr>
                            <td><?php echo $searchResult->id ?></td>
                            <td><?php echo $searchResult->departure ?></td>
                            <td><?php echo $searchResult->destination ?></td>
                            <td><?php echo $searchResult->bookingdate_from ?></td>
                            <td><?php echo $searchResult->bookingdate_to ?></td>
                            <td><?php echo $searchResult->flightdate_from ?></td>
                            <td><?php echo $searchResult->flightdate_to ?></td>
                            <td><?php echo $searchResult->amount ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>
    </body>
</html>