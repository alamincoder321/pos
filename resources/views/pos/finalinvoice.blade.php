<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>সাতক্ষীরা মধুভান্ডার</title>
    <link rel="shortcut icon" href="{{asset(('public/backend'))}}/images/favicon_1.ico">
    <link href="{{asset(('public/backend'))}}/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div style="display:flex;">
        <div class="navleft" style="width:65%">
            <h6 style="box-sizing:border-box; padding-left:25px;">ক্যাশ মেমো- {{$finalinvoice->invoice_no}}</h6>
            <h5 style="text-align: center;">খাঁটি মধুর বিশ্বস্ত প্রতিষ্ঠান</h5>
            <h2 style="text-align:center; font-size: 40px;">সাতক্ষীরা মধু ভান্ডার</h2>
            <p style="text-align:left; padding-left: 20px;box-sizing: border-box;">আমরা সব ধরনের মধু, ঘি, বিভিন্ন ধরনের তেল ও অর্গানিক ফুড পাইকারি এবং খুচরা বিক্রি করি। দেশ ও দেশের বাইরে বিভিন্ন কুরিয়ার সার্ভিসের মাধ্যমে পাঠিয়ে থাকি।</p>
        </div>

        <div style="width:35%; box-sizing: border-box; padding-top: 10px; padding-left: 20px;">
            <h4 class="pt-5 pt-md-5">মোবাইল- ০১৯৯০৮৫৫৭১৩</h4>
            <h4 style="font-size: 16px;" class="font-weight-bold">ফেসবুক- সাতক্ষীরা মধু ভান্ডার।</h4>
            <hr style="color:black; border-bottom: 1px solid #e3c4c4; margin: 0;" />
            <div class="text-center pt-2 pt-md-2">
                <h5>খাদ্যে ভেজাল থেকে বিরত থাকুন।</h5>
                <h5>আল্লাহ আপনাকে দেখছেন।</h5>
                <h5>আল্লাহকে ভয় করুন</h5>
            </div>
            <div style="background: wheat; width: 100%; display:flex;">
                <button style="padding: 5px 10px;font-size: 20px;background: green;border: none;color: black; border:none;">তারিখ-</button>
                <p style="padding-top: 9px;padding-left: 12px;">{{date("d.m.Y")}}</p>
            </div>
        </div>
    </div>

    <section>
        <div style="display: flex;border-bottom: 1px solid black;">
            <div style="width:55%; display:flex;">
                <p style="padding: 7px 35px;font-size: 25px;background: green;border: none;color: black;border-top-right-radius: 15px;box-sizing: border-box;">নাম-</p>
                <p style="font-size:20px;padding-top: 10px; padding-left: 35px; box-sizing: border-box;">{{$finalinvoice->customer->name}}</p>
            </div>
            <div style="width:45%; display:flex">
                <p style="padding: 7px 35px;font-size: 20px;line-height: 35px; background: green;border: none;color: black;border-top-right-radius: 15px;box-sizing: border-box;">কাস্টমার নাম্বার-</p>
                <p style="font-size:20px;padding-top: 10px; box-sizing: border-box;">{{$finalinvoice->customer->phone}}</p>
            </div>
        </div>
        <div style="width:100%; display:flex;">
            <p style="padding: 7px 35px;font-size: 25px;background: green;border: none;color: black;border-top-right-radius: 15px;box-sizing: border-box;">ঠিকানা-</p>
            <p style="font-size:20px; padding-left: 5px; padding-top: 10px; box-sizing: border-box;">{{$finalinvoice->customer->upozila}}, {{$finalinvoice->customer->city_name}}</p>
        </div>
    </section>

    <div class="row pt-md-4">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">বিবরন</th>
                        <th class="text-center">পরিমান</th>
                        <th class="text-center">দর</th>
                        <th class="text-center">টাকা</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td style="padding-left: 25px; box-sizing: border-box;">{{$item->product->name}}</td>
                        <td class="text-center">{{$item->weight}}</td>
                        <td class="text-center">{{$item->product->unit_cost}}</td>
                        <td class="text-center">{{$item->weight * $item->product->unit_cost}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-center">মোট</td>
                        <td class="text-center">{{$finalinvoice->total}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-center">জমা</td>
                        <td class="text-center">{{$finalinvoice->pay_amount}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-center">বাকি</td>
                        <td class="text-center">{{$finalinvoice->due}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div style="width:100%; text-align:center; font-size: 20px;margin-top: 35px;">আমাদের পন্যসমূহ</div>
    <section style="display: flex;">
        <div style="width:50%; border:1px solid black; border-right: none; padding-left: 50px;">
            <ul style="margin-top: 8px;">
                <li>খলিসা ফুলের মধু</li>
                <li>গ্রাম্য চাকের মধু</li>
                <li>গরান ফুলের মধু</li>
                <li>কালোজিরা ফুলের মধু</li>
                <li>সরিষা ফুলের মধু(প্রসেসিং/নন প্রসেসিং)</li>
                <li>লিচু ফুলের মধু(প্রসেসিং/নন প্রসেসিং)</li>
                <li>বিভিন্ন ফুলের মধু</li>               
            </ul>
        </div>
        <div style="width:50%; border:1px solid black; border-right: none; border-left: none; padding-left: 20px;">
            <ul style="margin-top: 8px;">
                <li>বিভিন্ন ফুলের মধু সুন্দরবন</li>
                <li>বরই ফুলের মধু</li>
                <li>কালোজিরার তেল</li>
                <li>খাঁটি গরুর ঘী</li>
                <li>খাঁটি সরিষার তেল</li>
                <li>খেজুরের গুর</li>
                <li>নারিকেল তেল</li>
                <li>আম</li> 
            </ul>
        </div>
    </section>
    <section style="display:flex; margin-top: 80px;">
        <div style="width:70%;"></div>
        <div style="width: 30%; text-align:center;">            
            <h4 style="padding-right: 30px;box-sizing: border-box;">ম্যানেজিং ডিরেক্টর</h4>
             <p style="padding-right: 30px;box-sizing: border-box;">মো: আবু রেফান শোয়াইব।</p>
        </div>
    </section>






<style type="text/css">
@media print{
    .hidden-print{
        visibility: hidden;
    }
}
.pull-right{position: absolute;bottom: 0; right: 50px;}
</style>
    <div class="hidden-print">
        <div class="pull-right">
            <a href="{{route ('details')}}" class="btn btn-danger btn-lg">Back</a>
            <button class="btn btn-success btn-lg" onclick="window.print();">Print</button>
        </div>
    </div> 
</body>
</html>