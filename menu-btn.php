<style>
    
.menu-btn{
	position: absolute;
	cursor: pointer;
	top: 15px;
	left: 30px;
	z-index: 102;
	color: #000000;
    transform: translateX(-3000px)
}

@media screen and (max-width: 720px){
    body{
      background: linear-gradient(45deg, #bbdcf4, #feecfe);
    }
    .modal-content {
    position: absolute;
    width: 400px;
    background-color: #fff;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: .3rem;
    }
    .mx-lt-5{
      background: none;
    }
    .navbar{
      background: none;
      position: absolute;
      
    }

    .navbar-light {
      box-shadow: 0 .65rem 1.75rem 0 rgba(0, 0, 0, 0.15)!important;
    }

    nav#sidebar {
        position: block;
        position: absolute;
        height: 100vh;
        left: 22px;
        width: 250px;
        z-index: 1;
        transform: translateX(-400px);
        transition: transform .5s ease-in-out;
        /* border-radius: 12px; */
      }
      
    .sidebar-list{
      display: block;
      position: fixed;
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
      width: 50px;
      cursor: pointer;
      color: #002003;
      top: 20px;
      left: 20px;
      font-size: 25px;
      z-index: 101;
      transform: translateX(-5px)
      }
    
    nav#sidebar.show,
    .sidebar-list.show {
      transform: translateX(-23px);
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
