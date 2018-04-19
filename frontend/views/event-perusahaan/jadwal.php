<?php
/**
 * Created by PhpStorm.
 * User: alief_alhadi
 * Date: 3/17/2018
 * Time: 4:04 PM
 */
?>

<br><br>
<div class="banner" style="width: 100%;">
    <img src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/foto_events/<?= $event->eventsThumbnails;?>" alt="">
</div>

<div class="section" style="
    background-image:url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png');
    padding-top:20px;padding-bottom: 10px;
    ">
    <div class="row">
        <h2 class="el-title">Jadwal <?= $event->eventsJudul?></h2>
        <div class="divider float-left"></div>
    </div>
</div>

<div class="section" style="padding: 20px;">
    <div class="row">
        <div class="panel panel-default panel-fade">

            <div class="panel-heading">

							<span class="panel-title">

								<div class="pull-left">

								<ul class="nav nav-tabs">
									<li class="active"><a href="#letters" data-toggle="tab"><i class="glyphicon glyphicon-send"></i> Jadwal tes</a></li>
									<li><a href="#emails" data-toggle="tab"><i class="glyphicon glyphicon-send"></i> Jadwal Presentasi</a></li>
								</ul>

								</div>

								<div class="btn-group pull-right">
									<div class="btn-group">
										<a href="#" class="btn  dropdown-toggle" data-toggle="dropdown">
											<span class="glyphicon glyphicon-cog"></span>
										</a>
										<ul class="dropdown-menu" role="menu">
											<li><a href="#">Action 1</a></li>
											<li><a href="#">Action 2</a></li>
											<li class="divider"></li>
											<li><a href="#">Another Action</a></li>
										</ul>
									</div>
								</div>

								<div class="clearfix"></div>

							</span>

            </div>

            <div class="panel-body">


                <div class="tab-content">






                    <div class="tab-pane fade in active" id="letters">
                        <h3>Letters</h3>
                        <FORM ACTION="" METHOD="post">
                            <INPUT TYPE="hidden" NAME="FormName" VALUE="PrintLetters">
                            <TABLE class="table table-striped">
                                <THEAD>
                                <TR><TH>Print</TH><TH style="text-align:left">Subscription</TH><TH style="text-align:left">Venue</TH><TH>Date/Time</TH><TH>Quantity</TH></TR>
                                </THEAD>
                                <TBODY>
                                <TR><TD><INPUT TYPE="checkbox" NAME="EventCode" VALUE=588031></TD><TD>Season Subscription (Winter)</TD><TD>Downtown Theater</TD><TD>1/1/2015 12:00 PM</TD><TD>8</TD></TR>
                                <TR><TD><INPUT TYPE="checkbox" NAME="EventCode" VALUE=588031></TD><TD>Season Subscription (Spring)</TD><TD>Downtown Theater</TD><TD>1/1/2015 12:00 PM</TD><TD>8</TD></TR>
                                <TR><TD><INPUT TYPE="checkbox" NAME="EventCode" VALUE=588031></TD><TD>Season Subscription (Summer)</TD><TD>Downtown Theater</TD><TD>1/1/2015 12:00 PM</TD><TD>8</TD></TR>
                                <TR><TD><INPUT TYPE="checkbox" NAME="EventCode" VALUE=588031></TD><TD>Season Subscription (Fall)</TD><TD>Downtown Theater</TD><TD>1/1/2015 12:00 PM</TD><TD>8</TD></TR>
                                </TBODY>
                            </TABLE>
                            Select events and click below<BR><BR>
                            <INPUT TYPE="submit" CLASS="btn btn-outline btn-default" VALUE="Submit">
                        </FORM>
                    </div>


                    <div class="tab-pane fade" id="emails">
                        <h3>Emails</h3>
                        <FORM ACTION="" METHOD="post">
                            <INPUT TYPE="hidden" NAME="FormName" VALUE="PrintLetters">
                            <TABLE class="table table-striped">
                                <THEAD>
                                <TR><TH>Print</TH><TH style="text-align:left">Subscription</TH><TH style="text-align:left">Venue</TH><TH>Date/Time</TH><TH>Quantity</TH></TR>
                                </THEAD>
                                <TBODY>
                                <TR><TD><INPUT TYPE="checkbox" NAME="EventCode" VALUE=588031></TD><TD>Season Subscription (Winter)</TD><TD>Downtown Theater</TD><TD>1/1/2015 12:00 PM</TD><TD>8</TD></TR>
                                <TR><TD><INPUT TYPE="checkbox" NAME="EventCode" VALUE=588031></TD><TD>Season Subscription (Spring)</TD><TD>Downtown Theater</TD><TD>1/1/2015 12:00 PM</TD><TD>8</TD></TR>
                                <TR><TD><INPUT TYPE="checkbox" NAME="EventCode" VALUE=588031></TD><TD>Season Subscription (Summer)</TD><TD>Downtown Theater</TD><TD>1/1/2015 12:00 PM</TD><TD>8</TD></TR>
                                <TR><TD><INPUT TYPE="checkbox" NAME="EventCode" VALUE=588031></TD><TD>Season Subscription (Fall)</TD><TD>Downtown Theater</TD><TD>1/1/2015 12:00 PM</TD><TD>8</TD></TR>
                                </TBODY>
                            </TABLE>
                            Select events and click below<BR><BR>
                            <INPUT TYPE="submit" CLASS="btn btn-outline btn-default" VALUE="Submit">
                        </FORM>
                    </div>

                    <div class="tab-pane fade" id="loglist">
                        <h3>Logs</h3>
                        <FORM ACTION="" METHOD="post">
                            <INPUT TYPE="hidden" NAME="FormName" VALUE="PrintLetters">
                            <TABLE class="table table-striped">
                                <THEAD>
                                <TR><TH>Print</TH><TH style="text-align:left">Subscription</TH><TH style="text-align:left">Venue</TH><TH>Date/Time</TH><TH>Quantity</TH></TR>
                                </THEAD>
                                <TBODY>
                                <TR><TD><INPUT TYPE="checkbox" NAME="EventCode" VALUE=588031></TD><TD>Season Subscription (Winter)</TD><TD>Downtown Theater</TD><TD>1/1/2015 12:00 PM</TD><TD>8</TD></TR>
                                <TR><TD><INPUT TYPE="checkbox" NAME="EventCode" VALUE=588031></TD><TD>Season Subscription (Spring)</TD><TD>Downtown Theater</TD><TD>1/1/2015 12:00 PM</TD><TD>8</TD></TR>
                                <TR><TD><INPUT TYPE="checkbox" NAME="EventCode" VALUE=588031></TD><TD>Season Subscription (Summer)</TD><TD>Downtown Theater</TD><TD>1/1/2015 12:00 PM</TD><TD>8</TD></TR>
                                <TR><TD><INPUT TYPE="checkbox" NAME="EventCode" VALUE=588031></TD><TD>Season Subscription (Fall)</TD><TD>Downtown Theater</TD><TD>1/1/2015 12:00 PM</TD><TD>8</TD></TR>
                                </TBODY>
                            </TABLE>
                            Select events and click below<BR><BR>
                            <INPUT TYPE="submit" CLASS="btn btn-outline btn-default" VALUE="Submit">
                        </FORM>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
