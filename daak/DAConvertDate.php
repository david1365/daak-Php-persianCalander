<?php
//namespace DaPhpClassLibrary{
	/** 
     * تبدیل تاریخ میلادی به خورشید -
     * برنامه نویس : داود اکبری -
     * 1388-1390
     * 
     * تاریخ هجری خورشیدی در حالت کلی به دوره های بزرگ 2820 ساله تقسیم شده است. 
     * که خود این دروره بزرگ به 21 دوره 128 ساله و یک دوره 132 ساله تقسیم شده است.
     * دوره 128 ساله شامل یک دوره 29 ساله و 3 دوره 33 ساله . 
     * و دروه 132 ساله شامل یک دوره 29 ساله و دو دوره  33 ساله و در آخر یک دوره 37 ساله است.
     * دوره 29 ساله دارای یک دوره 5 ساله و 6 دوره 4 ساله است.
     * دوره 33 ساله دارای یک دوره 5 ساله و 7 دوره 4 ساله است.
     * دوره 37 ساله دارای یک دوره 5 ساله و 8 دوره 4 ساله است.
     * سال های آخر دوره های 5  یا 4 ساله کبیسه است.
     * ساله های کبیسه 366 روز و سال های عادی 365 روز دارند.
     * منظور از عدد تنها 128 یا 132 یا 29 و... دوره های مربوطه است.
     * 
 	 * @package    DaPhpClassLibrary
 	 * @copyright  Copyright (c) 1388 through 1390,Davood Akbary
     * @license     
     */


	/**
	 * روز اول سال خورشیدی*/
	 function firstDay()
	 {
	 	return new DateTime('622-03-22');
	 }
	 
     /*سال های در نظر گرفته نشده - آغاز سال هجری خورشیدی */
     const  yearsCountblink = 2346;    
     /*تعداد سال دوره بزرگ*/
     const  yearsCountBigAGE = 2820;
     /*تعداد سال دوره 128ساله*/
     const  yearsCount128 = 128;
     /*تعداد سال دوره 132 ساله*/
     const  yearsCount132 = 132;
     /*تعداد سال دروه 29 ساله*/
     const  yearsCount29 = 29;
     /*تعداد سال دروه 33 ساله*/
     const  yearsCount33 = 33;
     /*تعداد سال دروه 37 ساله*/
     const  yearsCount37 = 37;
     /*تعداد سال دروه 5 ساله*/
     const  yearsCount5 = 5;
     /*تعداد سال دروه 4 ساله*/
     const  yearsCount4 = 4;
     /*تعداد دروه 128 ساله*/
     
     const  Count128Circuit = 21;
     /*تعداد دروه 132 ساله*/
     const  Count132Circuit = 1;
     
     /*تعداد سال دوره های 128 ساله*/
     define('yearsCount128AGES', Count128Circuit * yearsCount128);
     /*تعداد سال دوره های 132 ساله*/
     define('yearsCount132AGES', Count132Circuit * yearsCount132);

     /*تعداد سال گذشته شده تا قبل از زیر دوره 37 ساله*/
     define('yearsCountBefore37', yearsCount29 + (2 * yearsCount33));
     

     /*تعداد سال کبیسه دوره 128 ساله*/
     const  anomalyYearsCount128 = 31;
     /*تعداد سال کبیسه دوره 132 ساله*/
     const  anomalyYearsCount132 = 32;
     /*تعداد سال کبیسه دوره 29 ساله*/
     const  anomalyYearsCount29 = 7;
     /*تعداد سال کبیسه دوره 33 ساله*/
     const  anomalyYearsCount33 = 8;
     /*تعداد سال کبیسه دوره 37 ساله*/
     const  anomalyYearsCount37 = 9;
     /*تعداد سال کبیسه دوره کوچک 4 یا 5 ساله*/
     const  anomalyYearsCount4OR5 = 1;
     
     /*تعداد سال کبیسه کل دوره های 128 ساله*/   
     define('anomalyYearsCount128AGES', Count128Circuit * anomalyYearsCount128);

     /*تعداد سال کبیسه کل دوره های 132 ساله*/
     define('anomalyYearsCount132AGES', Count132Circuit * anomalyYearsCount132);
     /*تعداد سال کبیسه دوره بزرگ*/
     define('anomalyYearsCountBigAGE', anomalyYearsCount128AGES + anomalyYearsCount132AGES);
     /*تعداد سال کبیسه سال هایی که در نظر گرفته نشده است*/
     define('anomalyYearsCountBlink', ((int)(yearsCountblink / yearsCount128) * anomalyYearsCount128) + anomalyYearsCount29 + 3);//به این دلیل با 3 و 7 جمع شده که 42 سال دارای یک دوره 29 ساله است که دارای 7 سال کبیسه و 13 سال باقی در دوره 33 ساله است که 13 سال داری 3 سال کبیسه است 

     /*تعداد روز سال عادی*/
     const daysCountNormalYear = 365;
     /*تعداد روز سال کبیسه*/
     const daysCountAnomalyYear = 366;
     /*تعداد روز سال هایی که در نظر گرفته نشده*/
     define('daysCountBlinkYear', (yearsCountblink * daysCountNormalYear) + anomalyYearsCountBlink);
     /*تعداد روز دوره بزرگ 2820 ساله*/
     define('daysCountBigAGE', (yearsCountBigAGE * daysCountNormalYear) + anomalyYearsCountBigAGE);
     /*تعداد روز دوره 128 ساله*/
     define('daysCount128', (yearsCount128 * daysCountNormalYear) + anomalyYearsCount128);
     /*تعداد روز دوره 132 ساله*/
     define('daysCount132', (yearsCount132 * daysCountNormalYear) + anomalyYearsCount132);
     /*تعداد روز دوره 29 ساله*/
     define('daysCount29', (yearsCount29 * daysCountNormalYear) + anomalyYearsCount29);
     /*تعداد روز دوره 33 ساله*/
     define('daysCount33', (yearsCount33 * daysCountNormalYear) + anomalyYearsCount33);
     /*تعداد روز دوره 37 ساله*/
     define('daysCount37', (yearsCount37 * daysCountNormalYear) + anomalyYearsCount37);
     /*تعداد روز دوره کوچک 5 ساله*/
     define('daysCount5', (yearsCount5 * daysCountNormalYear) + anomalyYearsCount4OR5);
     /*تعداد روز دوره کوچک 4 ساله*/
     define('daysCount4', (yearsCount4 * daysCountNormalYear) + anomalyYearsCount4OR5);


     /*شماره سال های کبیسه*/
     define('arrYearNumber', 'return ' . var_export(array(0, 5, 9, 13, 17, 21, 25, 29, 33, 37 ), 1) . ';');
     /*نام برج های سال*/
     define('parsiMonthName', 'return ' . var_export(array(  1=>"فروردین" , 
														     2=>"ارديبهشت",
														     3=>"خرداد",
														     4=>"تير", 
														     5=>"امرداد",
														     6=>"شهريور",
														     7=>"مهر", 
														     8=>"آبان",
														     9=>"آذر", 
														     10=>"دى", 
														     11=>"بهمن",
														     12=>"اسفند"),
														     1) . ';');
								        /*
     *@param="$MonthNumber شماره برج سال خورشیدی
     *@exception اگر شماره ماه از 1 کوچکتر و از 12 بزرگتر باشد خطا صادر می شود
     static string ParsiMonthName($MonthNumber)
        {
            if (($MonthNumber > 12) || ($MonthNumber < 1))
                throw new Exception(".شماره برح های فارسی از 1 شروع شده و به 12 ختم می شود");

            return parsiMonthName[$MonthNumber - 1];
        }نام فارسی برج های ایرانی*/

     /*روزهای هفته*/
     define('parsiDayOfWeek', 'return ' . var_export( array(   "شنبه"
														     , "يكشنبه"
														     , "دوشنبه"
														     , "سه شنبه"
														     , "چهارشنبه"
														     , "پنجشنبه"
														     , "جمعه" ),
														     1) . ';');
        /*نام فارسی روزهای ایرانی
     *@param="DayNumber شماره روز هفته
     *@exception اگر شماره روز از صفر کوچک تر و از 6 بزرگتر باشد خطا صادر می شود
     static string ParsiDayOfWeekName(DayNumber)
        {
            if (DayNumber > 6)
                throw new Exception(".شماره روز های فارسی از صفر شروع و به 6 ختم می شود");

            return parsiDayOfWeek[DayNumber];
        }*/

     /*تعداد روز ماه های نیمه اول سال*/
     const daysCountYearFirstMid = 31;
     /*تعداد روز ماه های نیمه دوم سال*/
     const daysCountYearSecMid = 30;
     /*تعداد ماه در هر نیمه سال*/
     const monthCountEachYearMid = 6;
     /*تعداد ماه هر سال*/
     define('monthCountEachYear', monthCountEachYearMid * 2);

     /**
      * تعداد روز هفته*/
     const weekDaysCount = 7;
     
     
     /**
     * بدست آوردن اینکه سال مورد نظر در کدام دوره بزرگ است
     * @param int $ParsiYear سال خورشیدی
     * @return خروجی نشان می دهد که سال مورد نظر در کدام دوره بزرگ است
     * @exception اگر سال ورودی از 1 کمتر باشد خطا صادر می شود
     */
     function What2820($ParsiYear)
     {
            if ($ParsiYear <= 0)
                throw new Exception(".سال مورد قبول از یک شروع می شود");

            $ParsiYear += yearsCountblink;
            return (int)(ceil(((double)$ParsiYear / yearsCountBigAGE)));//ما سقف عدد بدست آمده را می خواهیم زیرا رقم سمت راست به این معنی است که وارد دوره شده است
     }

     
     /**
     * بدست آوردن اینکه تعداد روز ورودی در  کدام دوره بزرگ است
     * @param int $LastDays تعداد روز گذشته شده از ابتدای تاریخ خورشیدی
     * @return خروجی نشان دهنده کدام دوره بزرگ است
     */  
     function What2820AtDay($LastDays)//
     {
         return (int)(ceil((double)($LastDays + daysCountBlinkYear) / daysCountBigAGE));
     }
        
        
     /**
     * بدست آوردن مبدا دروه ی بزرگ سالی که از ورودی گرفته می شود
     * @param int $ParsiYear سال خورشیدی
     * @return  مبدا دوره بزرگ سال مورد نظر
     * @exception اگر سال ورودی از 1 کمتر باشد خطا صادر می شود
     */  
     function EraBigAGE($ParsiYear)
     {
         return ((What2820($ParsiYear) - 1) * yearsCountBigAGE) - yearsCountblink;
     }

     /**
     * سال طی شده از مبدا دوره مورد نظر بزرگ
     * @param int $ParsiYear سال خورشیدی
     * @return سال طی شده از مبدا دوره مورد نظر بزرگ
     * @exception اگر سال ورودی از 1 کمتر باشد خطا صادر می شود
     */   
     function LateFromEraBigAGE($ParsiYear)
     {
         return $ParsiYear - EraBigAGE($ParsiYear);
     }

     /**
     * سال مورد نظر در کدام دوره ی 128 یا 132 است
     * @param int $ParsiYear سال خورشیدی
     * @return سال مورد نظر در کدام دوره ی 128 یا 132 است
     * @exception اگر سال ورودی از 1 کمتر باشد خطا صادر می شود
     */  
     function What128Or132($ParsiYear)
     {
         //چون دور بزرگ به 21 دوره 128 و یک دوره 132 تقسیم شده
         return (int)(ceil((double)LateFromEraBigAGE($ParsiYear) / yearsCount128));
     }
     /** 
     * سال مورد نظر در کدام دوره ی128 یا 132 قرار دارد 
     * @param int $LastDays ورودی برحسب تعداد روز گذشته شده از ابتدای تاریخ خورشیدی
     * @return
     * سال مورد نظر در کدام دوره ی 128 یا 132  قرار دارد 
     */
     function What128Or132AtDay($LastDays)
     {
         $RestDays = ($LastDays + daysCountBlinkYear) - ((What2820AtDay($LastDays) - 1) * daysCountBigAGE);
         $RestDays /= (double)daysCount128;
         return (int)(ceil($RestDays));
     }

     /**
     * بدست آوردن مبدا دوره 128 یا 132 ای که سال مورد نظر در آن قرار دارد
     * @param int $ParsiYear سال خورشیدی
     * @return بدست آوردن مبدا دوره 128 یا 132 ای که سال مورد نظر در آن قرار دارد 
     * @exception اگر سال ورودی از 1 کمتر باشد خطا صادر می شود
     */
     function Era128Or132($ParsiYear)
     {
         $What = What128Or132($ParsiYear);
         $LateYear = 0;

         $LateYear = ($What > Count128Circuit) ? yearsCount128AGES : (int)(($What - 1) * yearsCount128);
         return ($What > Count128Circuit) ? (((What2820($ParsiYear) * $LateYear) + ((What2820($ParsiYear) - 1) * yearsCount132)) - yearsCountblink) : (EraBigAGE($ParsiYear) + $LateYear);
     }

     /**
     * چند سال از مبدا دوره 128 یا 132 که سال مورد نظر در آن قرار دارد گذشته است
     * @param int $ParsiYear سال خورشیدی
     * @return چند سال از مبدا دوره 128 یا 132 که سال مورد نظر در آن قرار دارد گذشته است
     * @exception اگر سال ورودی از 1 کمتر باشد خطا صادر می شود
     */ 
     function LateFromEra128Or132($ParsiYear)
     {
         return (int)($ParsiYear - Era128Or132($ParsiYear));
     }

     /**
     * چندمین دوره 33 ساله
     * @param int $LastParsiYear تعداد سال گدشته شده از مبدا دوره 128 یا 132 ساله 
     * @return چندمین دوره 33 ساله
     */  
     function WhatAge33($LastParsiYear)
     {
         return (int)(ceil((double)($LastParsiYear - yearsCount29) / yearsCount33));
     }

     /** @param int $RestDays تعداد روز گدشته شده از مبدا دوره 128 یا 132 ساله */        
     function WhatAge33FromRestDays($RestDays)
     {
         return (int)(ceil((double)($RestDays - daysCount29) / daysCount33));
     }

     /**
     * چند سال از ابتدای دوره 33 ساله می گذرد
     * @param int $LastParsiYear تعداد سال گدشته شده از مبدا دوره 128 یا 132 ساله 
     * @return چند سال از ابتدای دوره 33 ساله می گذرد
     */
     function LastAge33($LastParsiYear)
     {
         return (int)(yearsCount29 + ((WhatAge33($LastParsiYear) - 1) * yearsCount33));
     }

     /**
     * سال چندم در هر زیر دوره 29 یا 33 یا 37 است
     * @param int $ParsiYear سال خورشیدی
     * @return سال چندم در هر زیر دوره 29 یا 33 یا 37 است
     * @exception اگر سال ورودی از 1 کمتر باشد خطا صادر می شود
     */
     function WhatYearOFSubAge($ParsiYear)
     {
         $What = What128Or132($ParsiYear);
         $Last = LateFromEra128Or132($ParsiYear);

         return ($What > Count128Circuit) ? ((($Last <= yearsCountBefore37) && ($Last > yearsCount29)) ? (int)($Last - LastAge33($Last))
                   : (($Last > yearsCountBefore37) ? (int)($Last - yearsCountBefore37) : $Last))
                   : (($Last > yearsCount29) ? (int)($Last - LastAge33($Last)) : $Last);
     }

     /**
     * در کدام زیر دوره 29 یا 33 یا 37 است
     * @param int $ParsiYear سال خورشیدی
     * @return در کدام زیر دوره 29 یا 33 یا 37 است
     * @exception اگر سال ورودی از 1 کمتر باشد خطا صادر می شود
     */
     function WhatSubAge29Or33Or37($ParsiYear)
     {
         $What = What128Or132($ParsiYear);
         $Last = LateFromEra128Or132($ParsiYear);

         return ($What > Count128Circuit) ? ((($Last <= yearsCountBefore37) && ($Last > yearsCount29)) ? WhatAge33($Last)
                : (($Last > yearsCountBefore37) ? yearsCount37 : yearsCount29))
                : (($Last > yearsCount29) ? WhatAge33($Last) : yearsCount29);
     }

     /**
     * در کدام زیر دوره 29 یا 33 یا 37 است
     * @param int $LastDays روز گذشته شده از ابتدای دوره 128 یا 132
     * @return در کدام زیر دوره 29 یا 33 یا 37 است
     */ 
     function WhatSubAge29Or33Or37AtDay($LastDays)
     {
         $What128Or132 = What128Or132AtDay($LastDays);
         $RestDays = ($LastDays + daysCountBlinkYear) - ((What2820AtDay($LastDays) - 1) * daysCountBigAGE);
         $RestDays -= ($What128Or132 > Count128Circuit) ? (Count128Circuit * daysCount128) : (int)(($What128Or132 - 1) * daysCount128);

         return ($What128Or132 > Count128Circuit) ? ((($RestDays > daysCount29) && ($RestDays <= (daysCount29 + (2 * daysCount33)))) ? WhatAge33FromRestDays($RestDays)
                : (($RestDays > (daysCount29 + (2 * daysCount33))) ? yearsCount37 : yearsCount29))
                : (($RestDays > daysCount29) ? WhatAge33FromRestDays($RestDays) : yearsCount29);
     }

     /**
     * شناسایی اینکه سال کبیسه است یا نه
     * @param int $ParsiYear سال خورشیدی
     * @return اینکه سال کبیسه است یا نه
     * @exception اگر سال ورودی از 1 کمتر باشد خطا صادر می شود
     */
     function AnomalyYear($ParsiYear)
     {
         $Year = WhatYearOFSubAge($ParsiYear);
         return (($Year % yearsCount4 == 1) && ($Year != 1));
     }

    
     /** تعداد روز های برج های ایرانی
     *@param int $ParsiYear سال خورشیدی
     *@param int $Month برج خورشیدی
     *@return اینکه سال کبیسه است یا نه
     *@exception اگر شماره ماه از 1 کوچکتر و از 12 بزرگتر باشد خطا صادر می شود -یا- اگر سال از 1 کمتر باشد 
     */ 
     function ParsiMonthDaysCount($ParsiYear, $Month)
     {
         if (($Month > 12) || ($Month < 1))
             throw new Exception(".شماره برح های فارسی از 1 شروع شده و به 12 ختم می شود");
         $days = 0;
         $days = (($Month >= 1) && ($Month <= 6)) ? (int)31 : (((($Month >= 7) && ($Month <= 11))) ? (int)30 : ((($Month == 12) && (AnomalyYear($ParsiYear))) ? (int)30 : (int)29));
         return $days;
     }

     /**
     * تعداد سال کبسه تا قبل از سال مورد نظر
     * @param int $ParsiYear سال خورشیدی
     * @return تعداد سال کبسه تا قبل از سال مورد نظر
     * @exception اگر سال ورودی از 1 کمتر باشد خطا صادر می شود
     */   
     function MultipleAnomalyYear($ParsiYear)
     {
         //دوره 128 ساله ,31 سال و در دوره ی 132 ساله, 32 سال کبيسه وجود دارد و در هر دوره بزرگ 21 دوره 128 ساله و 1 دوره 132 ساله داريم.
         $Befor2820Now = (What2820($ParsiYear) - 1) * anomalyYearsCountBigAGE; //تعداد سال های کبيسه دوره های 2820 بزرگ قبل از دوره بزرگ سال مورد نظر
         $What = What128Or132($ParsiYear);

         $Befor128Or132Now = ($What > Count128Circuit) ? anomalyYearsCount128AGES : ($What - 1) * anomalyYearsCount128;
         //تعداد سال کبیسه تا قبل از دور 132 سال مورد نظر موجود- بعد از ؟
         //تعداد سال کبیسه تا قبل از دور 128 سال مورد نظر موجود - بعد از دونقطه

         //تعداد سال کبیسه طی شده تا قبل از سال مورد نظر در داخل دوره 128 یا 132
         //تعداد سال دقیق طی شده

         $LastFrom128Or132 = AnomalyYear($ParsiYear) ? (int)(LateFromEra128Or132($ParsiYear) - 1) : LateFromEra128Or132($ParsiYear);//سال طی شده از ابتدای دوره 128 یا 132 تا سال مورد نظر
         $SubAge = WhatSubAge29Or33Or37($ParsiYear);
         $LastFrom128Or132 -= (($SubAge == yearsCount29) ? (int)1 : ((($SubAge >= 1) && ($SubAge <= 3)) ? (int)(1 + $SubAge) : (int)4));
         $LastFrom128Or132 /= 4;//تعداد سال کبیسه طی شده از ابتدای 128 یا 132 تا سال مورد نظر

         return (int)$Befor2820Now + (int)$Befor128Or132Now + (int)$LastFrom128Or132;//تعداد سال کبیسه کل
     }
     
     /**
     * تبدیل روز به تاریخ خورشیدی با گرفتن سال و تعداد روز باقی مانده
     * @param int $ParsiYear سال فارسی
     * @param int $RestDay روز باقی مانده
     * @return تاریخ روز مورد نظر 
     * @exception اگر سال ورودی از 1 کمتر باشد خطا صادر می شود 
     */
     function DayToDate($ParsiYear, $RestDay)
     {
         @define('daysCountFirstMid', monthCountEachYearMid * daysCountYearFirstMid);//تعداد روز نیمه اول سال

         $RestDay++;

         $IsAYearEndDay = (($RestDay / daysCountAnomalyYear) == 1) && (!AnomalyYear($ParsiYear));//فهمیدن اینکه روز آخر هست و سال کبیسه نیست
         //به منظور ننوشتن دستورات شرطی تو در تو 30 یا 31 را به این صورت می شناسیم
         $MonthDaysCount = (int)(daysCountYearSecMid + (2 - ceil((double)$RestDay / daysCountFirstMid)));
         $WhatIsAMid = (int)($RestDay / daysCountFirstMid);//صفر مشخص کننده نیمه اول و یک مشخص کننده نیمه دوم است

         //به این دلیل مقدار را از 2 کم می کنیم جون دو نیم سال دارم و سال دوم باید صفر باشد
         $RestDay -= (int)(daysCountFirstMid * $WhatIsAMid);
         $Month = (double)$RestDay / $MonthDaysCount;
         $IsAEndDay = (int)(($RestDay - ((ceil($Month) - 1) * $MonthDaysCount)) / $MonthDaysCount);//اگز روز آخر ماه باشد 1 وگرنه صفر است
         $Month = ceil($Month) + (monthCountEachYearMid * $WhatIsAMid);//اگر در ماه دوم باشیم با 6 چمع می شود
         $RestDay = (int)(($RestDay % $MonthDaysCount) + ($IsAEndDay * $MonthDaysCount));

         $RestDay -= $IsAYearEndDay ? (int)daysCountYearSecMid - 1 : 0;
         $Month -= $IsAYearEndDay ? monthCountEachYear - 1 : 0;
         $ParsiYear += $IsAYearEndDay ? (int)1 : 0;

         return new DAParsiDate($ParsiYear, (int)$Month, (int)$RestDay);
     }


     /**
     * محاسبه روز اول سال مورد نظر
     * @param int $ParsiYear سال خورشیدی
     * @return محاسبه روز اول سال مورد نظر 
     * @exception اگر سال ورودی از 1 کمتر باشد خطا صادر می شود
     */ 
     function FirstDayYear($ParsiYear)
     {
         $Days = MultipleAnomalyYear($ParsiYear);
         $Days %= weekDaysCount;
         $Days += ((($ParsiYear - 1) % weekDaysCount) + 5);//روز اول سال یک  پنج شنبه بوده و به همین دلیل با 5 جمع می کنیم
         $Days %= weekDaysCount;
         return (int)$Days;
     }

     /**
     *شماره روز اول برج مورد نظر
     *@param int $ParsiYear سال خورشیدی
     *@param int $MonthNumber شماه برج
     *@return شماره روز اول برج مورد نظر 
     *@exception اگر شماره ماه از 1 کوچکتر و از 12 بزرگتر باشد خطا صادر می شود 
     */
     function FirstDayMonth($ParsiYear, $MonthNumber)
     {
         if (($MonthNumber > 12) || ($MonthNumber < 1))
             throw new Exception(".شماره برح های فارسی از 1 شروع شده و به 12 ختم می شود");
         $First = FirstDayYear($ParsiYear);//روز اول سال مورد نظر
         $First += ($MonthNumber <= weekDaysCount) ? (int)(($MonthNumber - 1) * 3) : (int)(($MonthNumber + 2) * 2);
         $First %= weekDaysCount;
         return $First;
     }

     /**
     * شماره روز هفته تاریخ مورد نظر
     * @param int $parsiDate تاریخ خورشیدی
     * @return شماره روز هفته تاریخ مورد نظر 
     */
     function DayOfWeekNumber($parsiDate)
     {
         //روز تاریخ را به این خاطر از یک کم می کنیم تا تعداد روز گذشته شده تا قبل از آن روز را بدست آوریم
         return (int)((FirstDayMonth($parsiDate->Year, $parsiDate->Month) + ($parsiDate->Day - 1)) % weekDaysCount);
     }

     /**
     * نام خورشیدی روز تاریخ مورد نظر
     * @param DAParsiDate $parsiDate تاریخ خورشیدی
     * @return نام خورشیدی روز تاریخ مورد نظر 
     */
     function DayOfWeekName($parsiDate)
     {
     	$EXparsiDayOfWeek = eval(parsiDayOfWeek);//چون آرایه به صورت ثابت تعریف شده با این تابع به حالت اول بر می گردد
         return $EXparsiDayOfWeek[DayOfWeekNumber($parsiDate)];
     }

     /**
     * محاسبه چندمین زیر دوره کوچک چهار ساله یا پنج ساله
     * @param int $LastDays تعداد روز گذشته شده
     * @return چندمین زیر دوره کوچک چهار ساله یا پنج ساله 
     */
     function What5Or4($LastDays)
     {
         $What = 0;
         if ($LastDays > daysCount5) //1826تعداد روز دوره کوچک 5 است
         {
             $LastDays -= daysCount5;
             $What = (int)ceil((double)$LastDays / daysCount4);
         }
         return $What;
     }

     /**
     * تبدیل روز ها ی گذشته شده به سال پارسی
     * @param int $LastDays تعداد روز گذشته شده
     * @param int &$RestDays روز باقی مانده
     * @return تبدیل روز ها ی گذشته شده به سال پارسی 
     */
     function DaysToYear($LastDays, &$RestDays)
     {
     	 $EXarrYearNumber = eval(arrYearNumber);//آرایه ای از ثابت هاست به همین دلیل باید با دستور روبرو به آرایه معمولی تبدیل شود
        	
         $What2820 = What2820AtDay($LastDays);//کدام 2820 بزرگ
         $Years2820 = ($What2820 - 1) * yearsCountBigAGE;//سال های 2820
         $RestDays = ($LastDays + daysCountBlinkYear) - (($What2820 - 1) * daysCountBigAGE);
         
         $What128Or132 = What128Or132AtDay($LastDays);

         $Years128Or132 = ($What128Or132 > Count128Circuit) ? yearsCount128AGES : ($What128Or132 - (int)1) * yearsCount128;
         $RestDays -= ($What128Or132 > Count128Circuit) ? (Count128Circuit * daysCount128) : (($What128Or132 - (int)1) * daysCount128);

         $Year = $Years2820 + $Years128Or132;

         $SubAge29Or33Or37 = WhatSubAge29Or33Or37AtDay($LastDays);

         $RestDays -= (($SubAge29Or33Or37 >= 1) && ($SubAge29Or33Or37 <= 3)) ? (daysCount29 + (($SubAge29Or33Or37 - (int)1) * daysCount33))
                      : (($SubAge29Or33Or37 == yearsCount37) ? (daysCount29 + (2 * daysCount33)) : 0);

         $Year += (($SubAge29Or33Or37 >= 1) && ($SubAge29Or33Or37 <= 3)) ? (yearsCount29 + (($SubAge29Or33Or37 - (int)1) * yearsCount33))
                  : (($SubAge29Or33Or37 == yearsCount37) ? (int)(yearsCount29 + (2 * yearsCount33)) : 0);

         $SubAge5Or4 = What5Or4((int)$RestDays);//تعداد زیر دوره گذشته شده 5 یا 4 //تعداد سال کبیسه
                        
         $RestDays -= (($EXarrYearNumber[$SubAge5Or4] * daysCountNormalYear) + $SubAge5Or4);
            
         $IN5O4 = (double)($RestDays - 1) / daysCountNormalYear;
         $Inside5Or4 = (int)floor($IN5O4);//سال چندم زیر دوره 5 یا 4
         $RestDays -= (daysCountNormalYear * $Inside5Or4);//داخل زیر دوره کوچک 5 یا 4

         if ((($Inside5Or4 == yearsCount4) && ($EXarrYearNumber[$SubAge5Or4] > 0)) || ($Inside5Or4 == yearsCount5)) //چون یک سال کبیسه است و در ضزب محاسبه نمی شود
             $RestDays--;

         $Year = ($Year + $EXarrYearNumber[$SubAge5Or4] + $Inside5Or4 + 1) - yearsCountblink;//با یک به خاطر اینکه از سال جدید آغاز شود چمع شد و از 2346 به این دلیل کم شد که سال های نادیده است
         return $Year;
     }
     

     /**
     * تبدیل تاریخ میلادی به خورشیدی
     * @param DateTime $Date تاریخ میلادی
     * @return تاریخ خورشیدی 
     * @exception اگر تاریخ ورودی از تاریخ - 0622/03/22 - میلادی کمتر باشد خطا صادر می شود
     */
     function ConvertToParsiDate($Date)
     {
         if ($Date < new DateTime('622-3-22'))
             throw new Exception(".تاریخ 0622/03/22 میلادی برار با روز اول تاریخ خورشیدی است" + "\n .باید تاریخ ورودی برابر یا بزرگتر از این تاریخ باشد");

         $RestDays = 0;
         
         @$interval = $Date->diff(firstDay()); //تعداد روز گذشته شده از سال یک تا تاریخ ورودی //1/01/01=622/03/22
         $LastDays = (int)$interval->format('%a');
                 
         $FirstYears = (int)DaysToYear($LastDays, $RestDays);//بدست  آوردن سال ابتدای سال تاریخ مورد نظر
         $parsiDate = DayToDate($FirstYears, (int)$RestDays);//تاریخ مورد نظر

         $dateReturn = new DAParsiDate($parsiDate->Year, $parsiDate->Month, $parsiDate->Day,
                                      (int)$Date->format('h'), (int)$Date->format('i'), (int)$Date->format('s'), $Date->format('u'));
     	
         
         #دستورات زیر به دلیل باگ موجود در شمارش تعداد روز گذشته شده از ابتدای سال خورشیدی در پی اچ پی ایجاد شده است
         if (ConvertToGregorian($dateReturn) != $Date)
         {
         	return $dateReturn->AddDays(1);
         }
         
         return $dateReturn;
     }  
     

     /**
     * تاریخ خورشیدی
     * @return تاریخ خورشیدی 
     */
      function ParsiDate()
      {
      	 return @ConvertToParsiDate(new DateTime('now'));
      }

     /**
     * تبدیل تاریخ خورشیدی به میلادی
     * @param DAParsiDate $parsiDate تاریخ فارسی
     * @return تبدیل تاریخ خورشیدی به میلادی 
     */
     function ConvertToGregorian($parsiDate)
     {
         $Days = LastDaysFromFirstDate($parsiDate);//تعداد روز گذشته شده از ابتدای تاریخ خورشیدی
         
         $firstDay = firstDay();
         return @$firstDay->add(date_interval_create_from_date_string("$Days days"));
     }
     
     /**
     * تعداد روز گذشته شده از ابتدای تاریخ خورشیدی
     * @param DAParsiDate $parsiDate تاریخ فارسی
     * @return تعداد روز گذشته شده از ابتدای تاریخ خورشیدی  
     */
     function LastDaysFromFirstDate($parsiDate)
     {
         $MultiplesAnomaly = MultipleAnomalyYear($parsiDate->Year) - anomalyYearsCountBlink;//تعداد سال کبیسه کل منهای تعداد سال کبیسه نادیده
         $Days = (($parsiDate->Year - 1) * daysCountNormalYear) + $MultiplesAnomaly;//تعداد کل روز های طی شده تا ابتدای سال مورد نظر
         $ExtraDays = ($parsiDate->Month > monthCountEachYearMid) ? (int)monthCountEachYearMid : (int)($parsiDate->Month - 1);
         $OtherDays = (($parsiDate->Month - 1) * daysCountYearSecMid) + $ExtraDays;//ماه ها تا قبل از ماه مورد نظر ضرب در 30  و با روز اضافی مر بوط به فصل بهار و تابستان جمع شده
         $Days += ((int)($OtherDays + $parsiDate->Day) - 1);//بدین دلیل از یک  کم می شود چون 1/1/1 یک روز کامل است و در نظر گرفته شده است و می خواهیم از 0/0/0 حساب شود

         return $Days; 
     }
//}
?>