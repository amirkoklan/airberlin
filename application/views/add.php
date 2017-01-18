<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Amir Booking System</title>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified CSS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
        <script src="http://malsup.github.com/jquery.form.js"></script> 
        <script type="text/javascript" src="/js/main.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css.map">

        <style type="text/css">
            .search-form {
                margin-bottom: 30px;
            }
            td,th {
                padding: 10px;
            }
            .form-group {
                margin-bottom: 15px;
            }
            #resultUpdate {
                clear: both;
                margin-top: 15px;
                display: inline-block;
            }
            td button {
                margin-left: 15px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <form name="add" class="add-mile form-horizontal col-sm-12" action="add/addOrUpdateNewMile" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="departure">Departure</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="departure" name="departure" required="requied"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="destination">Destination</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="destination" name="destination" required="requied"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="bookingdate_from">Booking Date - From</label>
                    <div class="col-sm-10">
                        <input type="text" class="datepicker form-control" id="bookingdate_from" name="bookingdate_from" data-provide="datepicker" data-date-format="yyyy-mm-dd" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="bookingdate_to">Booking Date - To</label>
                    <div class="col-sm-10">
                        <input type="text" class="datepicker form-control" id="bookingdate_to" name="bookingdate_to" data-provide="datepicker" data-date-format="yyyy-mm-dd" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="flightdate_from">Flight Date - From</label>
                    <div class="col-sm-10">
                        <input type="text" class="datepicker form-control" id="flightdate_from" name="flightdate_from" data-provide="datepicker" data-date-format="yyyy-mm-dd" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="flightdate_to">Flight Date - To</label>
                    <div class="col-sm-10">
                        <input type="text" class="datepicker form-control" id="flightdate_to" name="flightdate_to" data-provide="datepicker" data-date-format="yyyy-mm-dd" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="amount">Amount</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="amount" name="amount" required="required"/>
                    </div>
                </div>
                <input type="hidden" class="id" name="id">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="clear-form btn btn-danger">Clear Form</button>
            </form>
            <div id="resultUpdate"></div>
            <div>
                <?php if ($results): ?>
                    <table class="table-hover table-striped all-miles">
                        <tr>
                            <th>id</th>
                            <th>departure</th>
                            <th>destination</th>
                            <th>Booking Date - FROM</th>
                            <th>Booking Date - To</th>
                            <th>Flight Date - FROM</th>
                            <th>Flight Date - To</th>
                            <th>Amount</th>
                            <th></th>
                        </tr>
                        <tbody>
                            <?php foreach ($results as $searchResult): ?>
                                <tr>
                                    <td class="id"><?php echo $searchResult->id ?></td>
                                    <td class="departure" ><?php echo $searchResult->departure ?></td>
                                    <td class="destination" ><?php echo $searchResult->destination ?></td>
                                    <td class="bookingdate_from" ><?php echo $searchResult->bookingdate_from ?></td>
                                    <td class="bookingdate_to" ><?php echo $searchResult->bookingdate_to ?></td>
                                    <td class="flightdate_from" ><?php echo $searchResult->flightdate_from ?></td>
                                    <td class="flightdate_to" ><?php echo $searchResult->flightdate_to ?></td>
                                    <td class="amount" ><?php echo $searchResult->amount ?></td>                                
                                    <td>
                                        <button class="edit btn btn-info" edit-id="<?php echo $searchResult->id ?>" >Edit</button>
                                        <button class="delete btn btn-danger" delete-id="<?php echo $searchResult->id ?>" >Delete</button>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>