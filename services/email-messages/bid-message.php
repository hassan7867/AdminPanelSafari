<?php

namespace services\email_messages;

class BidMessage
{
    public function bidMessageBody($operatorName, $tourTitle, $bid)
    {
        $emailBody = '
   <body>
   <div style="margin: 0 auto;max-width: 800px;background: rgba(211,211,211,0.68);padding: 30px">
    <div style="margin: 0 auto;max-width: 600px;background: white">
    <div style="background-color: black;border-top: 5px solid #6b9ce8;border-bottom: 5px solid #6b9ce8;padding: 10px;color: white">
                <p style="color: white;text-align: center;font-size: 26px">
                Your Bid is Rejected.
                </p>
        </div>
        <div style="padding: 15px">
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Operator: ' . $operatorName . '</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Tour Title: ' . $tourTitle . '</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Your Bid: ' . $bid . ' USD</div>
        </div>
  </div>
</div><br>
</div>
 </div>
            </body>
            ';
        return $emailBody;
    }

    public function bidAcceptMessageBody($operatorName, $tourTitle, $bid, $token)
    {
        $emailBody = '
   <body>
   <div style="margin: 0 auto;max-width: 800px;background: rgba(211,211,211,0.68);padding: 30px">
    <div style="margin: 0 auto;max-width: 600px;background: white">
    <div style="background-color: black;border-top: 5px solid #6b9ce8;border-bottom: 5px solid #6b9ce8;padding: 10px;color: white">
                <p style="color: white;text-align: center;font-size: 26px">
                Your Bid is Accepted.
                </p>
        </div>
        <div style="padding: 15px">
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Operator: ' . $operatorName . '</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Tour Title: ' . $tourTitle . '</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Your Bid: ' . $bid . ' USD</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Please Click On Below Link and Pay 10% Of Your Bid To Confirm Booking</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px"><a href="'. url('customer-payment') .'/'. $token .'"> Click Here To Pay</a></div>
        </div>
  </div>
</div><br>
</div>
 </div>
            </body>
            ';
        return $emailBody;
    }

    public function bidBookedMessageToCustomer($operator, $tourTitle, $bid)
    {
        $emailBody = '
   <body>
   <div style="margin: 0 auto;max-width: 800px;background: rgba(211,211,211,0.68);padding: 30px">
    <div style="margin: 0 auto;max-width: 600px;background: white">
    <div style="background-color: black;border-top: 5px solid #6b9ce8;border-bottom: 5px solid #6b9ce8;padding: 10px;color: white">
                <p style="color: white;text-align: center;font-size: 26px">
                Your Tour is Booked.
                </p>
        </div>
        <div style="padding: 15px">
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Operator: ' . $operator['company_name'] . '</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Operator Email: ' . $operator['email'] . '</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Operator Phone: ' . $operator['telephone'] . '</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Tour Title: ' . $tourTitle . '</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Your Bid: ' . $bid . ' USD</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">You paid 10% Of Your Bid To Confirm Booking.</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">You can pay remaining 90% to operator when you meet them physically. You can contact operator through above details.</div>
        </div>
  </div>
</div><br>
</div>
 </div>
            </body>
            ';
        return $emailBody;
    }

    public function bidBookedMessageToOperator($tourTitle, $bid)
    {
        $emailBody = '
   <body>
   <div style="margin: 0 auto;max-width: 800px;background: rgba(211,211,211,0.68);padding: 30px">
    <div style="margin: 0 auto;max-width: 600px;background: white">
    <div style="background-color: black;border-top: 5px solid #6b9ce8;border-bottom: 5px solid #6b9ce8;padding: 10px;color: white">
                <p style="color: white;text-align: center;font-size: 26px">
               A Customer Booked Your Tour.
                </p>
        </div>
        <div style="padding: 15px">
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Customer: ' . $bid['name'] . '</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Customer Email: ' . $bid['email'] . '</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Customer Phone: ' . $bid['phone'] . '</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Customer Country: ' . $bid['country'] . '</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Tour Title: ' . $tourTitle . '</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Customer will pay remaining 90% to you on location. Please contact customer through above details.</div>
        </div>
  </div>
</div><br>
</div>
 </div>
            </body>
            ';
        return $emailBody;
    }

    public function bidCompletedMessageBody($operator, $tourTitle, $bid)
    {
        $emailBody = '
   <body>
   <div style="margin: 0 auto;max-width: 800px;background: rgba(211,211,211,0.68);padding: 30px">
    <div style="margin: 0 auto;max-width: 600px;background: white">
    <div style="background-color: black;border-top: 5px solid #6b9ce8;border-bottom: 5px solid #6b9ce8;padding: 10px;color: white">
                <p style="color: white;text-align: center;font-size: 26px">
                Your Tour is Completed.
                </p>
        </div>
        <div style="padding: 15px">
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Operator: ' . $operator['company_name'] . '</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Tour Title: ' . $tourTitle . '</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Please Click On Below Link to give feedback on operator profile</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px"><a href="'. env('MAIN_APP_URL').'/review/'.$operator['id'].'"> Click Here</a></div>
        </div>
  </div>
</div><br>
</div>
 </div>
            </body>
            ';
        return $emailBody;
    }

}
