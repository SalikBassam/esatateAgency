<?php 
require "connectDb.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/ad59909c53.js"
      crossorigin="anonymous"
    ></script>
    <!-- Boxicons -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <!-- Swiper js -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="styles.css" />
    <title>Announce managment</title>
  </head>

  <body>
    <!-- Header -->
    <header class="header" id="header">
      <div class="navigation">
        <div class="nav-center container d-flex">
          <div style="display:flex;">
            <img src="images/logo2.png" alt="" class="logo" />
            <h1 style="color:white; margin-top:2rem;">HomeLand</h1>
          </div>
          <ul class="nav-list d-flex">
            <li class="nav-item">
              <a href="#" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="#add_ann" class="nav-link">Add Announce</a>
            </li>
          </ul>

          <div class="hamburger">
            <i class="bx bx-menu-alt-left"></i>
          </div>
        </div>
      </div>

      <div class="hero">
        <div class="swiper-container heroslider">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="./images/pic1.jpg" alt="" />
            </div>
            <div class="swiper-slide">
              <img src="./images/pic2.jpg" alt="" />
            </div>
            <div class="swiper-slide">
              <img src="./images/pic5.jpg" alt="" />
            </div>
            <div class="swiper-slide">
              <img src="./images/pic6.jpg" alt="" />
            </div>
          </div>
          <div class="swiper-button-next">
            <i class="bx bx-chevron-right swiper-icon"></i>
          </div>
          <div class="swiper-button-prev">
            <i class="bx bx-chevron-left swiper-icon"></i>
          </div>
        </div>
      </div>

      <div class="content">
        <h1>Find your dream home</h1>
        <div class="search">
          <div class="labels">
            <label for="text">Type</label>
            <select name="Type" id="search_type">
              <option value="Choose" selected>--</option>
              <option value="Sell">Sell</option>
              <option value="Buy">Rental</option>
            </select>
          </div>
          <div class="labels">
            <label for="number">Min Price</label>
            <input type="number" placeholder="100$" />
          </div>
          <div class="labels">
            <label for="number">Max Price</label>
            <input type="number" placeholder="100$" />
          </div>

          <a href="">Search</a>
        </div>
      </div>
    </header>

    <section class="section rent">
      <button
        id="add_ann"
        type="button"
        data-bs-toggle="modal"
        data-bs-target="#announceModal"
      >
        Add A New Announce
      </button>
  <div class="rent-center container">
      <?php 
      $query = "SELECT * FROM annonce";
      $query_run = mysqli_query($conn , $query);

      if (mysqli_num_rows($query_run) > 0) {

foreach ($query_run as $annonc) {
  ?>
  <div class="box">
    <div class="top">
      <div class="overlay">
        <img src="<?php echo $annonc['image_path']?>" alt="" />
      </div>
      <div class="pos">
        <span><?php echo $annonc['type_annonce']?></span>
      </div>
    </div>
    <div class="bottom">
      <h3><?php echo $annonc['title']?></h3>
      <p><?php echo $annonc['amount']?>$</p>
      <div>
        <button
          type="button"
          class="Info"
          data-bs-toggle="modal"
          data-bs-target="#exampleModal"
        >
          More Info
        </button>
        <span
          ><i
            data-bs-toggle="modal"
            data-bs-target="#EditModal"
            class="fa-solid fa-pen-to-square"
          ></i
        ></span>
        <form action="annonceData.php" method="post">
          <button type="submit" name="delete" value="<?php echo $annonc['id']?>">
          <span
          ><i
            data-bs-toggle="modal"
            data-bs-target="#DeleteModal"
            class="fa-solid fa-trash"
            
          ></i
        ></span>
          </button>
       
</form>
      </div>
</div>
</div>

      <!-- More Info Modal -->
      <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">
              <?php echo $annonc['title']?>
              </h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div id="modal_flex">
                <div>
                  <img src="images/pic3.jpg" alt="" />
                </div>
                <div>
                  <h4>Id : <span class="a_info"><?php echo $annonc['id']?></span></h4>
                  <h4>
                    Title : <span class="a_info"><?php echo $annonc['title']?></span>
                  </h4>
                  <h4>
                    Description :
                    <span class="a_info"
                      ><?php echo $annonc['description']?></span
                    >
                  </h4>
                  <h4>
                    Adress :
                    <span class="a_info"
                      ><?php echo $annonc['address']?></span
                    >
                  </h4>
                  <h4>Amount : <span class="a_info"><?php echo $annonc['amount']?></span></h4>
                  <h4>
                    Announce Date : <span class="a_info"><?php echo $annonc['date_annonce']?></span>
                  </h4>
                  <h4>Type : <span class="a_info"><?php echo $annonc['type_annonce']?></span></h4>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-warning"
                data-bs-dismiss="modal"
              >
                Close
              </button>
            </div>
          </div>
        </div>
      </div>



      
    <?php }}else {
     echo "<h5> no annonces </h5>";
    }  ?>

     
</div>
      <!-- End of More Info Modal -->

      <!-- Add announce Modal -->

      <div
        class="modal fade"
        id="announceModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">
                Add New Announce
              </h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <form action="annonceData.php" method="post" enctype="multipart/form-data">
              <div id="modal_flex">
                <div>
                  <label class="imglabel" for="img">
                    <img src="images/insertimage.png" alt="" />
                    <input type="file" id="img" name="img" accept="image/*"  name="image" />
                    <h3>Add An Image</h3>
                  </label>
                </div>
                <div>
                  <!-- <div>
                    <label>Id :</label>
                    <input type="text" class="container">
                  </div> -->
                  <div>
                    <label>Title : </label>
                    <input type="text" class="container" name="title"/>
                  </div>
                  <div>
                    <label>Description : </label>
                    <input type="text" class="container" name="Description"/>
                  </div>
                  <div>
                    <label>Surface : </label>
                    <input type="number" class="container" name="surface"/>
                  </div>
                  <div>
                    <label>Adress : </label>
                    <input type="text" class="container" name="Adress"/>
                  </div>
                  <div>
                    <label>Amount : </label>
                    <input type="number" class="container" name="Amount"/>
                  </div>
                  <div>
                    <label>Announce Date : </label>
                    <input type="date" class="container" name="Ad" />
                  </div>
                  <div>
                    <label>Type : </label>
                    <select name="type" class="container">
                      <option value="- Select Type -" selected>
                        - Select Type -
                      </option>
                      <option value="rent">rent</option>
                      <option value="vente">vente</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-warning"
                data-bs-dismiss="modal"
              >
                Cancel
              </button>
              <button
                type="submit"
                class="btn btn-warning"
                data-bs-dismiss="modal"
                name="add"
              >
                Add Announce
              </button>
            </div>
          </div>
          </form>
        </div>
      </div>

      <!-- End Add announce Modal -->

      <!-- Edit Modal -->

      <div
        class="modal fade"
        id="EditModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">
                Edit Announce
              </h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div id="modal_flex">
                <div>
                  <label class="imglabel" for="img">
                    <img src="images/insertimage.png" alt="" />
                    <input type="file" id="img" name="img" accept="image/*" />
                    <h3>Add An Image</h3>
                  </label>
                </div>
                <div>
                  <div>
                    <label>Title : </label>
                    <input type="text" class="container" />
                  </div>
                  <div>
                    <label>Description : </label>
                    <input type="text" class="container" />
                  </div>
                  <div>
                    <label>Area : </label>
                    <input type="text" class="container" />
                  </div>
                  <div>
                    <label>Adress : </label>
                    <input type="text" class="container" />
                  </div>
                  <div>
                    <label>Amount : </label>
                    <input type="number" class="container" />
                  </div>
                  <div>
                    <label>Announce Date : </label>
                    <input type="date" class="container" />
                  </div>
                  <div>
                    <label>Type : </label>
                    <select name="type" class="container">
                      <option value="- Select Type -" selected>
                        - Select Type -
                      </option>
                      <option value="Rental">Rental</option>
                      <option value="Sell">Sell</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-warning"
                data-bs-dismiss="modal"
              >
                Close
              </button>
              <button
                type="button"
                class="btn btn-warning"
                data-bs-dismiss="modal"
              >
                Update
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- End Edit Modal -->

      <!-- delet Modal -->

      <div
        class="modal fade"
        id="DeleteModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">
                Delete Announce
              </h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div id="modal_flex">                
                  
                  <h3><i class="fa-sharp fa-solid fa-trash"></i>Are you sure you want to delete this announce ?</h3> 
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-warning"
                data-bs-dismiss="modal"
              >
                Cancel
              </button>
              <button
                type="button"
                class="btn btn-warning"
                data-bs-dismiss="modal"
              >
                Delete
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- End delete Modal -->
    </section>

    <!-- Footer -->
    <footer class="footer">
      <div class="row">
        <div class="col d-flex">
          <img src="images/logo2.png" alt="" />
        </div>
        <div class="col d-flex">
          <h4>INFORMATION</h4>
          <a href="">About us</a>
          <a href="">Term & Conditions</a>
        </div>
        <div class="col d-flex">
          <h4>USEFUL LINK</h4>
          <a href="">Online Store</a>
          <a href="">Customer Services</a>
          <a href="">Promotion</a>
        </div>
        <div class="col d-flex">
          <h4>CONTACT US</h4>
          <a href="">+212561870055</a>
          <a href="">support@homeland.com</a>
        </div>
      </div>
      <p class="copyright">&copy;All Right Reserved , HomeLand 2023/2024</p>
    </footer>
  </body>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="./js/slider.js"></script>
  <script src="./js/index.js"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"
  ></script>
</html>
