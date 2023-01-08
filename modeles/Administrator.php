<?php

class Administrator
{
    private int $id;
    private string $first_name;
    private string $last_name;
    private string $email;
    private string $password;
    private string $creation_date;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name): void
    {
        $this->first_name = ucwords(strtolower($first_name));
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName(string $last_name): void
    {
        $this->last_name = strtoupper(strtolower($last_name));
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getCreationDate(): string
    {
        return $this->creation_date;
    }

    /**
     * @param string $creation_date
     */
    public function setCreationDate(string $creation_date): void
    {
        $this->creation_date = $creation_date;
    }


    public function addAdministrator(): void
    {
        $this->setLastName($_POST['lastName']);
        $this->setFirstName($_POST['firstName']);
        $this->setEmail($_POST['email']);

        $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $this->setPassword($hashedPassword);

        $today = date("Y-m-d");
        $this->setCreationDate($today);

        try {

            require_once (__DIR__.'/../controleurs/bdd_connexion.php');

            $sql = 'INSERT INTO administrators(first_name, last_name, email, password, creation_date) VALUES (:first_name, :last_name, :email, :password, :creation_date)';
            $statement = $pdo->prepare($sql);
            $statement->bindParam('first_name', $this->first_name, PDO::PARAM_STR);
            $statement->bindParam('last_name', $this->last_name, PDO::PARAM_STR);
            $statement->bindParam('email', $this->email, PDO::PARAM_STR);
            $statement->bindParam('password', $this->password, PDO::PARAM_STR);
            $statement->bindParam('creation_date', $this->creation_date, PDO::PARAM_STR);

            if ($statement->execute()){
                echo '
                <div class="alert alert-success mt-4" role="alert">
                  L\'administrateur a été créé avec succès!
                </div>';
            } else {
                echo '
                <div class="alert alert-danger mt-4" role="alert">
                  Impossible de créer l\'administrateur !
                </div>';
            }   echo '
            </main>
            </div>
            </body>
            </html>';

        } catch (PDOException $e) {
            echo 'Une erreur s\'est produite lors de la communication avec la base de données';
        }
    }

    public function displayAdministratorsList (): void
    {
        try {
            require (__DIR__.'/../controleurs/bdd_connexion.php');

            if (!isset($_GET['page'])){
                $_GET['page']=1;
            }
            $currentpage = $_GET['page'];

            $sql = 'SELECT COUNT(*) AS nb_administrators FROM administrators';
            $statement1 = $pdo->prepare($sql);
            $statement1->execute();
            $result = $statement1->fetch();

            $nbAdministrators = $result['nb_administrators'];
            $nbParPage = 5;
            $nbPages = ceil($nbAdministrators/$nbParPage);
            $start = ($currentpage*$nbParPage)-$nbParPage;

            $sql2 = 'SELECT * FROM administrators ORDER BY last_name ASC  LIMIT :start, :nbParPage';
            $statement2 = $pdo->prepare($sql2);

            $statement2->bindParam('start', $start, PDO::PARAM_INT);
            $statement2->bindParam('nbParPage', $nbParPage, PDO::PARAM_INT);

            if ($statement2->execute()) {
                while($administrator = $statement2->fetchObject('Administrator')){
                        echo     '<tr class="align-middle">
                                                <th scope="row">'.$administrator->getFirstName().'</th>
                                                <td>'.$administrator->getLastName().'</td>
                                                <td>'.$administrator->getEmail().'</td>
                                                <td class="text-end">
                                                    <form method="post">
                                                        <button type="submit" class="btn btn-danger" name="suppressionbutton" value="'.$administrator->getId().'">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                              <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                                            </svg>      
                                                            <span class="d-none d-md-inline ps-1">Supprimer</span>                                              
                                                        </button>
                                                    </form>
                                                </td>
                                    </tr>
                                        ';
                }
                echo '   
                            </tbody>
                            </table>
                            </div>
                            <div class="text-center mt-4">
                                <a role="button" class="btn btn-success" href="/controleurs/add_administrator.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                      <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                    <span class="ps-1">Ajouter un administrateur</span>
                                </a>
                            </div>';
                if($nbAdministrators>$nbParPage){
                        echo '
                        <nav aria-label="Page navigation mt-4 bg-dark">
                          <ul class="pagination bg-succes justify-content-center mt-4">
                             <li class="page-item ';if($currentpage == 1){echo'disabled';} else{"";};echo'"><a class="page-link" href="administrators_listing.php/?page='.($currentpage-1).'">Precédente</a></li>';
                        for($page=1;$page<=$nbPages;$page++){
                            echo'<li class="page-item ';if($currentpage==$page){echo'active';}else{"";};echo'"><a class="page-link" href="administrators_listing.php/?page='.$page.'">'.$page.'</a></li>';
                        }
                        echo'<li class="page-item ';if($currentpage == $nbPages){echo'disabled';}else{"";};echo'"><a class="page-link" href="administrators_listing.php/?page='.($currentpage+1).'">Suivante</a></li>
                          </ul>
                        </nav>
                        </main>
                        </body>
                        </html>
                        ';
                } else {
                    echo '</main>
                          </body>
                          </html>';
                }
            }
            else {
                $errorInfo = $statement2->errorInfo();
                echo $errorInfo[2];
            }
        } catch (PDOException $e) {
            echo 'Une erreur s\'est produite lors de la communication avec la base de données';
            }
        }

    public function removeAdministrator(int $administratorId): void
    {
        try {

            include (__DIR__.'/../controleurs/bdd_connexion.php');

            $sql2='DELETE FROM administrators WHERE id=:id';
            $statement = $pdo->prepare($sql2);

            $statement->bindParam('id', $administratorId, PDO::PARAM_INT);

            if ($statement->execute()) {
                echo '<div class="alert alert-success">L\'Administrateur a été supprimé correctement de la base de données</div>';
            }
            else {
                    $errorInfo = $statement->errorInfo();
                    echo $errorInfo[2];
                }
        } catch (PDOException $e) {
            echo 'Une erreur s\'est produite lors de la communication avec la base de données';
        }
    }

    public function connectAdministrator(): void
    {
        try {


            require_once (__DIR__.'/../controleurs/bdd_connexion.php');
            session_start();
            if(isset($_POST['email']))
            {
                $email = stripslashes($_POST['email']);
                $password = stripslashes($_POST['password']);
                $sql='SELECT * FROM administrators WHERE email = :email';

                $statement = $pdo->prepare($sql);
                $statement->bindParam('email',$email, PDO::PARAM_STR);

                if ($statement->execute()){
                        $administrator1 = $statement->fetchObject('Administrator');
                        if ($administrator1 == false){
                            echo '<div class="alert alert-danger">Le nom d\'utilisateur est incorrect.</div>';
                        } else {
                            if (password_verify($password,$administrator1->getPassword())){
                                $_SESSION['administratorId'] = $administrator1->getId();
                                $_SESSION['email'] = $administrator1->getEmail();
                                $_SESSION['firstName'] = $administrator1->getFirstName();
                                $_SESSION['lastName'] = $administrator1->getLastName();
                                $_SESSION['password'] = $administrator1->getPassword();
                                $_SESSION['connected'] = true;
                                header('Location: profile.php');
                            } else {echo '<div class="alert alert-danger">Le nom d\'utilisateur ou le mot de passe est incorrect.</div>';}
                        }
                    }
                }

        } catch (PDOException $e) {
        echo 'Une erreur s\'est produite lors de la communication avec la base de données';
        }
    }

    public function modifyProfile () {

        try {

        $id = $_SESSION['administratorId'];

        require_once (__DIR__.'/../controleurs/bdd_connexion.php');

        $sql = 'SELECT * FROM administrators WHERE id=:id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam('id', $id, PDO::PARAM_INT);

        if($statement->execute()){
            while($administrator = $statement->fetchObject('Administrator')) {

                $this->setLastName(strtoupper(strtolower($_POST['lastName'])));
                $this->setFirstName(ucfirst(strtolower($_POST['firstName'])));
                $this->setEmail($_POST['email']);
                $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $this->setPassword($hashedPassword);

                $id1 = $administrator->getId();
                $sql1 = 'UPDATE administrators SET first_name=:fisrt_name, last_name=:last_name, email=:email, password=:password WHERE id = :id';
                $statement1 = $pdo->prepare($sql1);
                $statement1->bindParam('first_name', $this->first_name, PDO::PARAM_STR);
                $statement1->bindParam('last_name', $this->last_name, PDO::PARAM_STR);
                $statement1->bindParam('email', $this->email, PDO::PARAM_STR);
                $statement1->bindParam('password', $this->password, PDO::PARAM_STR);
                $statement1->bindParam('id', $id1, PDO::PARAM_INT);

                if ($statement1->execute()){
                    echo '
                <div class="alert alert-success mt-4" role="alert">
                  L\'administrateur a été modifié avec succès!
                </div>';
                    $_SESSION['email'] = $this->email;
                    $_SESSION['firstName'] = $this->first_name;
                    $_SESSION['lastName'] = $this->last_name;
                    $_SESSION['password'] = $this->password;
                header('Location: /controleurs/profile.php');
                } else {
                    echo '
                <div class="alert alert-danger mt-4" role="alert">
                  Impossible de modifier l\'administrateur !
                </div>';
                }   echo '
                </main>
                </div>
                </body>
                </html>';

                }
            }
        } catch (PDOException $e) {
            echo 'Une erreur s\'est produite lors de la communication avec la base de données';
        }
    }

}