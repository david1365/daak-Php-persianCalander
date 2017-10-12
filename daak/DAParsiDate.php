<?php
//namespace DaPhpClassLibrary
//{
	require 'DAConvertDate.php';
	require 'DACorrectionFunction.php';
	 /**
  	  *نوع داده تاریخ خورشیدی -
      *برنامه نویس : داود اکبری -
      * 1388-1390
      * @package    DaPhpClassLibrary
 	  * @copyright  Copyright (c) 1388 through 1390,Davood Akbary
 	  * @license 
 	  * @property-read DAParsiDate $MaxValue حداکثر تاریخ خورشیدی
	  * @property-read DAParsiDate $MinValue حداقل تاریخ خورشیدی
	  * @property-read string $MonthName نام خورشیدی برج مورد نظر
	  * @property-read int $DayOfWeekNumber شماره روز هفته تاریخ مورد نظر
	  * @property-read string $DayOfWeekName نام روز هفته تاریخ مورد نظر
	  * @property-read int $Microsecond ماکروثانیه
	  * @property-read int $Second ثانیه
	  * @property-read int $Minute دقیقه
	  * @property-read int $Hour ساعت
	  * @property-read int $Day روز
	  * @property-read int $Month برج
	  * @property-read int $Year سال
	  * @property-read DAParsiDate $Now تاریخ امروز
	  */	
    class DAParsiDate
    {            	
        private $microsecond;
        private $second;
        private $minute;
        private $hour;
        private $day;
        private $month;
        private $year;

        /**
        * متدی که داده را با توجه به پارامتر ورودی می سازد
        * @param int $year سال خورشیدی بین - 1 و 9223372036854775807 است
        * @param int $month برج خورشیدی - بین 1 و 12 است
        * @param int $day روز خورشیدی - بین 1 و حداکثر تعداد روز ماه مورد نظر
        * @param int $hour ساعت - بین 0 و 23 است
        * @param int $minute دقیقه - بین 0 و 59 است
        * @param int $second ثانیه - بین 0 و 59 است
        * @param int $microsecond ماکروثانیه - بین 0 و 999999 است
        */
        public function DAParsiDate($year = 1, $month = 1, $day = 1, $hour = 0, $minute = 0 , $second = 0, $microsecond = 0)
        {
        	
        	$ExParsiMonthName = eval(parsiMonthName);
        	
            if (($year <= 0) || ($year > PHP_INT_MAX))
                throw new Exception("سال مورد قبول بین یک و ".PHP_INT_MAX." است");
            else if (($month > 12) || ($month < 1))
                throw new Exception(".برج های سال خورشیدی بین 1 و 12 است");
            else if (($day < 1) || ($day > ParsiMonthDaysCount($year, $month)))
                throw new Exception("روز برج" . " " . $ExParsiMonthName[$month] . " سال " . $year . " بین عدد 1 و  " . ParsiMonthDaysCount($year, $month) . " است ");
            else if (($hour < 0) || ($hour > 23))
                throw new Exception("ساعت بین 0 و 23 است");
            else if (($minute < 0) || ($minute > 59))
                throw new Exception("دقیقه بین 0 و 59 است");
            else if (($second < 0) || ($second > 59))
                throw new Exception("ثانیه بین 0 و 59 است");
            else if (($microsecond < 0) || ($microsecond > 999999))
                throw new Exception("ماکروثانیه بین 0 و 999999 است");
			
            $this->year = $year;
            $this->month = $month;
            $this->day = $day;
            $this->hour = $hour;
            $this->minute = $minute;
            $this->second = $second;
            $this->microsecond = $microsecond;
        }

        /*
         * اضافه کردن صفر اضافه در سمت چپ اعداد یک رقمی
         * @return یک عدد چند رقمی که سمت چپ آن صفر است
         */
        private function addZero($str, $len = 1)
        {        
        	$zero = str_repeat('0', $len);
        	
	        if (strlen($str) < 2) 
	        {
	            $str = $zero . $str;
	        }
	        return $str;
        }
        
        
         public function __toString()
   		 {
        	return $this->year . '-' . $this->addZero((string)($this->month)) . '-' . $this->addZero((string)($this->day)) . ' ' . $this->addZero((string)$this->hour) . ':' . $this->addZero((string)($this->minute)) . ':' . $this->addZero((string)($this->second)) . '.' . $this->addZero((string)($this->microsecond), 5);
    	 }
        
       

         /* public DateTime Date { get; }
           public int DayOfYear { get; }
         public DateTimeKind Kind { get; }
       public long Ticks { get; }      
        public TimeSpan TimeOfDay { get; }       
        public static DateTime Today { get; }       
        public static DateTime UtcNow { get; }      
        public int Year { get; }*/

        
        

        

        
       

        /**
        * اضافه کردن به ماه
        * @param months تعداد ماه
        * <returns>
        * اضافه کردن به ماه</returns>
        public DAParsiDate AddMonths(long months)
        {
            sbyte tempMonth = ($this->month + months) > 12 ? (sbyte)(($this->month + months) % 12) :
                (($this->month + months) <= 0 ? (sbyte)(12 + (($this->month + months) % 12)) : (sbyte)($this->month + months));

            long tempyear = ($this->month + months) > 12 ? ($this->month + months) / 12 :
                (($this->month + months) <= 0 ? -(1 - (($this->month + months) / 12)) : 0);

            return new DAParsiDate($this->AddYears(tempyear)->Year, (byte)tempMonth, $this->day, $this->hour
                                   , $this->minute, $this->second, $this->microsecond);
	/*
 		این تابع مشکلاتی دارد که برای استقاده به کد نوشته شده به زبان پایتون توجه شود
	
        }

        /**
        * اضافه کردن به سال
        * @param Years تعداد سال
        * <returns>
        * اضافه کردن به سال</returns>
        public DAParsiDate AddYears(long Years)
        {
            return new DAParsiDate($this->year + Years, $this->Month, $this->day, $this->hour
                                   , $this->minute, $this->second, $this->microsecond);
        }
        
        */
        
        public function __get($var)
    	{
    		switch ($var){
   			    /**حداکثر تاریخ خورشیدی*/
    			case 'MaxValue':
    				return new DAParsiDate(PHP_INT_MAX, 12, 29, 23, 59, 59, 999999);
    			/**حداقل تاریخ خورشیدی*/
    			case 'MinValue':
    				return new DAParsiDate(); 
    			/**نام خورشیدی برج مورد نظر*/	
    			case 'MonthName':
    				$ExParsiMonthName = @eval(parsiMonthName); 
            	    return $ExParsiMonthName[$this->month]; 
            	/**شماره روز هفته تاریخ مورد نظر*/
    			case 'DayOfWeekNumber': 
    				return @DayOfWeekNumber($this);
    			/**نام روز هفته تاریخ مورد نظر*/
    			case 'DayOfWeekName':
    				return @DayOfWeekName($this);
    			/**ماکروثانیه*/
    		 	case 'microsecond':
    		 		return $this->microsecond;
    		 	/**ثانیه*/
    		 	case 'Second':
    		 		return $this->second;
    		 	/**دقیقه*/
    		 	case 'Minute':
    		 		return $this->minute;
    		 	/**ساعت*/
    		 	case 'Hour':
    		 		return $this->hour;
    	        /**روز*/
    		 	case 'Day':
    		 		return $this->day;
    		 	/**برج*/
    		 	case 'Month':
    				return $this->month;
    			 /**سال*/
    		 	case 'Year':
    		 		return $this->year;   
    		 	/**تاریخ امروز*/
    		 	case 'Now': 
    		 		return @ParsiDate();
    		 							 	
    		}
    	}
   	
    	
    	/*
    	 * اضافه کردن به سال
    	 * @param int $years<p>
	 	 * تعداد سال 
	 	 * </p>	
	 	 * @return تاریخ که به تعداد ورودی, سال به آن اضافه شده و یا کم شده است
    	 */
    	public function AddYears($years)
    	{
    		return new DAParsiDate($this->year + $years, $this->month, $this->day, $this->hour, $this->minute, $this->second, $this->microsecond);
   	 	}
    
   	 	
    	/*
    	 * اضافه کردن به برج
    	 * @param int $months<p>
	 	 * تعداد برج 
	 	 * </p>	
	 	 * @return تاریخ که به تعداد ورودی, ماه به آن اضافه شده و یا کم شده است
    	 */
    	public function AddMonths($months)
    	{    		
    		if ($months != 0)
    		{
            #در زیر تعداد سال یا ماهی که قرار است کم یا زیاد شود بدست می آید
            $tempYear = floor(abs($months) / 12);
            $tempMonth = abs($months) % 12;
         
            #در زیر اگر ورودی صفر باشد هیچ عملی انجام نمی شود ولی اگر منفی یا مثبت باشد با توجه به آن ماه و سال بدست می آید
            if ($months > 0)
            {
                $tempMonth = $this->Month + $tempMonth;
                if ($tempMonth > 12)
                {
                    $tempYear += floor($tempMonth / 12);#حداکثر یکسال اضافه می شود
                    $tempMonth = ($tempMonth % 12);
                }     
            }                            
            else
            {
                $tempMonth = $this->Month - $tempMonth;                
                if ($tempMonth <= 0)
                {
                    $tempMonth = 12 + $tempMonth;#if($this->Month <= $tempMonth) (12 + $this->Month) - $tempMonth#با این دلیل با 12 جمع می شود زیرا عدد منقی است و خروجی عددی مثبت و ماه مورد نظر است
					$tempYear += 1;#در زیر .سال با تابع مربوط به خود کم یا زیاد می شود و جمع با ۱ یعنی یکسال دیگر برای کم شدن اضافه می شود                    
                }
                $tempYear = -$tempYear;#در اینجا منفی می شود زیرا می خواهیم اگر با تابع حساب شد کم کند 
            }
            return new DAParsiDate($this->AddYears($tempYear)->year, $tempMonth, $this->day, $this->hour, $this->minute, $this->second, $this->microsecond);
    		}
        return $this;
    	}
    
    	
    	/*
    	 * اضافه کردن به روز
    	 * @param int $days<p>
	 	 * تعداد روز 
	 	 * </p>	
	 	 * @return تاریخ که به تعداد ورودی,‌ روز به آن اضافه شده و یا کم شده است
    	 */
    	public function AddDays($days)
    	{ 
    		if ($days != 0)
    		{ 
    			$LastDays = LastDaysFromFirstDate($this);//تعداد روز گذشته شده از ابتدای تاریخ خورشیدی
    			$LastDays += $days;//با تعداد روز ورودی جمع یا کم می شود  		
    		
    			$FirstYears = (int)DaysToYear($LastDays, $RestDays);//بدست  آوردن سال ابتدای سال تاریخ مورد نظر
				$parsiDate = DayToDate($FirstYears, (int)$RestDays);//تاریخ مورد نظر

         		return  new DAParsiDate($parsiDate->year, $parsiDate->month, $parsiDate->day,
                	                       (int)$this->hour, (int)$this->minute, (int)$this->second, $this->microsecond);
    		}
    		return $this;    		
      	}
    
      	
      	/*
    	 *یک تابع کلی به منظور اضافه و کم کردن اجزای زمان
    	 * @param int $components<p>
	 	 * تعداد جزء زمان 
	 	 * </p>	
	 	 * @param int $component<p>
	 	 * جزء زمان 
	 	 * </p>	
	 	 * @param int $division<p>
	 	 * عدد تقسیم 
	 	 * </p>	
	 	 * @return آرایه ای که دو ایندکس دارد که شامل مقدار دو جزء زمان است
    	 */
      	private function addTimeComponents($components, $component, $division)
      	{
      		#در زیر تعداد جز بزرگتر یا جز کوچکتر که قرار است کم یا زیاد شود بدست می آید
           	$LargerComponent = floor(abs($components) / $division);
            $SmallerComponent = abs($components) % $division; 
			#در زیر اگر ورودی صفر باشد هیچ عملی انجام نمی شود ولی اگر منفی یا مثبت باشد با توجه به آن ماه و سال بدست می آید
    		if ($components > 0)
            {
                $SmallerComponent += $component;
                if ($SmallerComponent > ($division - 1))
                {
                    $LargerComponent += floor($SmallerComponent / $division);#حداکثر یک اضافه می شود
                    $SmallerComponent = ($SmallerComponent % $division);
                }     
            }                            
            else
            {
            	#از عدد تقسیم یکی کمتر بیشتر نمی شود#در این قسمت مثل جمع و تفریق معمولی امابرمبنای عدد تقسیم ورودی عمل می کنیم
                $SmallerComponent =  $component >= $SmallerComponent ? $component - $SmallerComponent : ($division + $component) - $SmallerComponent;                
                $LargerComponent += $component <= $SmallerComponent ? 1 : 0;#جمع با یک یعنی یکی کمتر#در این قسمت اگر شرط درست باشد با یک جمع می شود                     
	                
                $LargerComponent = -$LargerComponent;#در اینجا منفی می شود زیرا می خواهیم اگر با تابع حساب شد کم کند 
            }
            return array('SmallerComponent' => $SmallerComponent, 'LargerComponent' => $LargerComponent);     		
    	}
      	
      	
        /*
    	 * اضافه کردن به ساعت
    	 * @param int $hour<p>
	 	 * تعداد ساعت 
	 	 * </p>	
	 	 * @return تاریخ که به تعداد ورودی‌, ساعت به آن اضافه شده و یا کم شده است
    	 */
    	public function AddHours($hour)
    	{ 
    		if ($hour != 0)
    		{	
    			$arrComponents = $this->addTimeComponents($hour, $this->hour, 24);        	
    			
            	$dayAdded = $this->AddDays($arrComponents['LargerComponent']);
         		return  new DAParsiDate($dayAdded->Year, $dayAdded->Month, $dayAdded->Day,
                	                       $arrComponents['SmallerComponent'], (int)$this->minute, (int)$this->second, $this->microsecond);
    		}
    		return $this;    		
      	}
      	
      	
   	    /*
    	 * اضافه کردن به دقیقه
    	 * @param int $minute<p>
	 	 * تعداد دقیقه 
	 	 * </p>	
	 	 * @return تاریخ که به تعداد ورودی,‌ دقیقه به آن اضافه شده و یا کم شده است
    	 */
    	public function AddMinute($minute)
    	{ 
    		if ($minute != 0)
    		{
				$arrComponents = $this->addTimeComponents($minute, $this->minute, 60);
    			
            	$hourAdded = $this->AddHours($arrComponents['LargerComponent']);
         		return new DAParsiDate($hourAdded->year, $hourAdded->month, $hourAdded->day, $hourAdded->hour, 
         								$arrComponents['SmallerComponent'], $this->second, $this->microsecond);
    		}
    		return $this;    		
      	}
      	
      	
        /*
    	 * اضافه کردن به ثانیه
    	 * @param int $second<p>
	 	 * تعداد ثانیه 
	 	 * </p>	
	 	 * @return تاریخ که به تعداد ورودی‌, ثانیه به آن اضافه شده و یا کم شده است
    	 */
    	public function AddSecond($second)
    	{ 
    		if ($second != 0)
    		{
    			$arrComponents = $this->addTimeComponents($second, $this->second, 60);
	            
            	$minuteAdded = $this->AddMinute($arrComponents['LargerComponent']);
         		return new DAParsiDate($minuteAdded->year, $minuteAdded->month, $minuteAdded->day, $minuteAdded->hour, $minuteAdded->minute,
         								$arrComponents['SmallerComponent'], $this->microsecond);
    		}
    		return $this;    		
      	}
    
    	
        /*
    	 * اضافه کردن به ماکروثانیه
    	 * @param int $microsecond<p>
	 	 * تعداد ماکروثانیه 
	 	 * </p>	
	 	 * @return تاریخ که به تعداد ورودی‌ ماکروثانیه به آن اضافه شده و یا کم شده است
    	 */
    	public function AddMicrosecond($microsecond)
    	{ 
    		if ($microsecond != 0)
    		{
    			$arrComponents = $this->addTimeComponents($microsecond, $this->microsecond, 1000000);
	            
            	$secondAdded = $this->AddSecond($arrComponents['LargerComponent']);
         		return new DAParsiDate($secondAdded->year, $secondAdded->month, $secondAdded->day, $secondAdded->hour, $secondAdded->minute, 
         								$secondAdded->second, $arrComponents['SmallerComponent']);
    		}
    		return $this;    		
      	}
      	
     
        /**زمان امروز
        public TimeSpan TimeOfDay
        {
            get { return new TimeSpan($this->hour, $this->minute, $this->second, $this->microsecond); }
        }
    	
    	
    	
    	        /**
        * قرار دادن مقدار تمامی خصوصیات در آرایه ای از آبجکت
        
        * <remarks>year = {0},  month = {1}or{2}, day = {3}or{4}, hour = {5}or{6}or{7}or{8}, minute = {9}or{10}, second = {11}or{12}, microsecond = {13}, DayOfWeekName = {14}, MonthName = {15}, Meridian = {16}or{17}</remarks>
        * <returns>آرایه ای از سال و ماه و روز و غیره از تاریخ</returns>
        public object[] ToObjectArray()
        {
            string M = $this->month->ToString()->Length < 2 ? "0" + $this->month->ToString() : $this->month->ToString();
            string D = $this->day->ToString()->Length < 2 ? "0" + $this->day->ToString() : $this->day->ToString();
            string H = $this->hour->ToString()->Length < 2 ? "0" + $this->hour->ToString() : $this->hour->ToString();
            string Mi = $this->minute->ToString()->Length < 2 ? "0" + $this->minute->ToString() : $this->minute->ToString();
            string S = $this->second->ToString()->Length < 2 ? "0" + $this->second->ToString() : $this->second->ToString();
            string Meridian = $this->hour >= 12 ? "ب->ظ" : "ق->ظ";
            string Meridian2 = $this->hour >= 12 ? "بعد از ظهر" : "قبل از ظهر";
            string H12 = ($this->hour > 12) || ($this->hour < 1) ? Math->Abs($this->hour - 12)->ToString() : $this->hour->ToString();
            string H12z = H12->Length < 2 ? "0" + H12 : H12;

            return new object[] { $this->year, $this->month, M, $this->day, D, $this->hour, H, H12, H12z, $this->minute, Mi,
                                  $this->second, S, $this->microsecond, $this->DayOfWeekName, $this->MonthName, Meridian, Meridian2};
        }

        /**
        * year = {0},  month = {1}or{2}, day = {3}or{4}, hour = {5}or{6}or{7}or{8}, minute = {9}or{10}, second = {11}or{12}, microsecond = {13}, DayOfWeekName = {14}, MonthName = {15}, Meridian = {16}or{17}
        
        * <example>ToString("{7} {0}/{1}/{2}")</example>
        * @param format فرمتی که تاریخ باید به آن صورت نمایش داده شود - اگر دو تا کوتیشن در داخل ورودی قرار دهید و روی متد با موس کمی مکث کنید شماره نمایش هر مقدار نشاد داده می شود
        * <returns>رشته تاریخ</returns>
        public string ToString(string format)
        {
            return ($this->year > 0)  && ($this->month > 0) && ($this->day > 0) ? string->Format(format, ToObjectArray()) : "";
        }

        /**تبدیل به رشته
        public override String ToString()
        {
            string format = "{14} {0}/{2}/{4}";
            format += ($this->hour > 0) || ($this->minute > 0) || ($this->second > 0) || ($this->microsecond > 0) ? " {8}:{10}:{12} {16}" : "";
            return ToString(format);
        }*/
    }
//}	
?>