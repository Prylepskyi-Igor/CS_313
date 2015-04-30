function snowflake(){
    this.isMoveRight = (Math.random() * 2 > 1)?true:false;
    this.verticalPosition = window.screen.availHeight * Math.random();
    this.center = (window.screen.availWidth - window.screen.availWidth * 0.1) * Math.random();
    this.horizontalPosition = this.center;
    this.maxSnowflakeSizeRange = 10;
    this.width = this.maxSnowflakeSizeRange * Math.random();
    this.minSnowflakeSize = this.maxSnowflakeSizeRange * 0.2;
    this.height = 1.05 * this.width;
    this.minFallingSpeed = 0.5;
    this.snowflakeSizeChangeRate = 0.1 / 9;
    this.changeSize = (Math.random() * 2 > 1)?1:-1;
    
    this.createSnowflake = function(num){
        // create element
        var elementImg = document.createElement("img");
        document.getElementById('snowflakeContainer').appendChild(elementImg);
        alert('1');
        //create variable that contains path
        elementImg = document.getElementsByTagName("img")[num + 1];
        // create element "src" attribute
        var att = document.createAttribute("src");
        // give it a value
        att.value = "snowflake.png";
        alert('2');
        // assign it to the element
        elementImg.setAttributeNode(att);
        // set element's style to the fixed position
        elementImg.style.position = "fixed";
        alert('3');
        // set element's top style value
        elementImg.style.top = String(this.verticalPosition) + "px";
        // set element's left style value
        elementImg.style.left = String(this.horizontalPosition) + "px";
        // set element's width style value
        elementImg.style.width = String(this.width) + "px";
        // set element's height style value
        elementImg.style.height = String(this.height) + "px";
    }
    
    this.movePoint = function(num){
        // set falling speed
        this.fallingSpeed = this.minFallingSpeed + this.width / 20;
        // select element path
        var element = document.getElementsByTagName("img")[num + 1];
        // set fall speed
        this.verticalPosition += this.fallingSpeed;
        element.style.top = String(this.verticalPosition) + "px";
        // set snowflake's right movement limit
        var setRightDirection = this.center - window.screen.availWidth * Math.random();
        // set snowflake's left movement limit
        var setLeftDirection = this.center + window.screen.availWidth * Math.random();
        // set snowflake to move to the right
        if(this.horizontalPosition < setRightDirection)
            this.isMoveRight = true;
        // set snowflake to move to the left
        else if(this.horizontalPosition > setLeftDirection)
            this.isMoveRight = false;
        // move it to the right
        if(this.isMoveRight){
            var setMoveRightSpeed = this.horizontalPosition + this.fallingSpeed * 0.5;
            this.horizontalPosition = setMoveRightSpeed;
            element.style.left = String(this.horizontalPosition) + "px";
        }   
        // move it to the left
        else{
            var setMoveLeftSpeed = this.horizontalPosition - this.fallingSpeed * 0.5;
            this.horizontalPosition = setMoveLeftSpeed;
            element.style.left = String(this.horizontalPosition) + "px";
        }
        // set size change direction
        if(this.width < this.minSnowflakeSize)
            this.changeSize = 1;
        else if(this.width > this.maxSnowflakeSizeRange)
            this.changeSize = -1;
        // change snowflake size
        this.height += this.changeSize * this.snowflakeSizeChangeRate * 1.05;
        this.width += this.changeSize * this.snowflakeSizeChangeRate;
        // assign size to element
        element.style.width = String(this.width) + "px";
        element.style.height = String(this.height) + "px";
        
        // reset snoflake to its' initial vertical position
        if(this.verticalPosition > window.screen.availHeight){
            this.verticalPosition = -40;
            this.center = (window.screen.availWidth - window.screen.availWidth * 0.1) * Math.random();}
        // move snowflake to the opposite side of the screen
        else if(this.horizontalPosition > window.screen.availWidth - window.screen.availWidth * 0.1)
            this.horizontalPosition = 0;
        else if(this.horizontalPosition < 0)
            this.horizontalPosition = window.screen.availWidth - window.screen.availWidth * 0.1;
    }
}