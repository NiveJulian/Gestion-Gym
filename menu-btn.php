<style>
    
.menu-btn{
	position: absolute;
	cursor: pointer;
	top: 15px;
	left: 30px;
	z-index: 2;
	color: #000000;
    transform: translateX(-3000px)
}

@media screen and (max-width: 720px){
    body{
      background: #181b22;
    }
    .mx-lt-5{
      background: none;
    }
    .navbar{
      margin-left: 30px;
      background: none;
      position: absolute;
    }

    nav#sidebar {
        position: absolute;
        height: 100vh;
        left: 22px;
        box-shadow: 2px 6px 3px 3px rgba(0, 0, 0, 0.3);
        width: 200px;
        opacity: 1.4;
        z-index: 1;
        transform: translateX(-400px);
        transition: transform .5s ease-in-out;
        /* border-radius: 12px; */
      }
      
    .sidebar-list{
      display: block;
      width: 100%;
      height: 100vh;
      position: absolute;
      top: 30px;
      left: 24px;
      text-align:center;
      padding: 20px;
      opacity: 1.4;
      transform: translateX(-300px);
      transition: transform .5s ease-in-out;
    }

    .menu-btn{
      position: absolute;
      cursor: pointer;
      color: #ffffff;
      top: 10px;
      left: 20px;
      font-size: 25px;
      z-index: 2;
      transform: translateX(-5px)
      }
    
    nav#sidebar.show,
    .sidebar-list.show {
      transform: translateX(-20px);
    }

     .sidebar-list{
      padding: 5px;
      font-size: 14px;
      
     }

}
</style>

<div class="menu-btn fixed-top">
        <i class="fa-solid fa-bars x2"></i>
</div>
