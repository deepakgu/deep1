
<?php

class Auth extends CI_controller
{
    public function register()
    {
         $this->session->flashdata('message_name');
       // echo $a;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name');
        
        $this->form_validation->set_rules('email','Email');
        $this->form_validation->set_rules('mobile','Mobile');
        
      //  $this->load->view('register');

    
       
        if($this->form_validation->run()==false){
        //   echo "hello";
         $this->load->view('register');
        }else{
           

            $this->load->model('Auth_model');
            $formArray=array();
            $formArray['name']=$this->input->post('name');
            $formArray['email']=$this->input->post('email');
            $formArray['mobile']=$this->input->post('mobile');
             $this->Auth_model->create($formArray);
             $this->session-set_flashdata('msg','Your account has been created successfully.');
            // redirect(url:base_url().'index.php/Auth/register');
        }
    }
    public function abc(){
        $this->load->model('Auth_model');
        $formArray=array();
        $formArray['name']=$this->input->post('name');
        $formArray['email']=$this->input->post('email');
        $formArray['mobile']=$this->input->post('mobile');
        $this->Auth_model->create($formArray);
        $this->session->set_flashdata('message_name', 'This is my message');
// After that you need to used redirect function instead of load view such as   
      //   redirect('/auth/register', 'refresh');
       
// Get Flash data on view 
       
        // redirect(url:base_url().'abc');
       
    }
    public function login()


    {
            $this->load->model('Auth_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','required|valid_name');
       // $this->form_validation->set_rules('name','Name','required|');

        $this->form_validation->set_rules('email','Email','required|valid_email');
        // echo "hiiiiiiii";
        // echo $this->form_validation->run();
          if($this->form_validation->run() == true)
          {
                    $email= $this->input->post('email');
                   // echo $email;
                    $user=$this->Auth_model->checkUser($email);
                   //      echo $user;
                    if(!empty($user))
                    {//echo "helllo1111111111";
                         $email= $this->input->post('email');
                        if(email_verify($email,$user['email'])==true)
                        {
                            $sessarray['id']=$user['id'];
                            $sessarray['name']=$user['name'];
                            $sessarray['email']=$user['email'];
                           $this->session->set_userdata('user',$sessarray);
                            
                            redirect(base_url().'index.php/auth/dass');
                        }
                        else
                        {
                            // echo "helllo-----------------";/
                            $this->session->set_flashdata('mgs','either ,name or email is incorrect,please try again.');
                            redirect(base_url().'index.php/auth/dass'); 
                        }

                    }else
                    {
                      //  echo "helllo####################";
                        $this->session->set_flashdata('mgs','either ,name or email is incorrect,please try again.');
                        redirect(base_url().'index.php/auth/login');  
                    }
          }
        else{
              //  echo "yeee";
                $this->load->view('login');
            }

    }
    public function dass()

    {
        // $this->load->model('Auth_model');
        // if($this->Auth_model->dass()==false)
        // {
        //     $this->session->set_flashdata('msg','you are not authorized');
        //     redirect(base_url().'/index.php/auth/login');
        // }
        $this->load->view('dass');
    }
    public function logout()
    {
        echo 'ddd';
        $this->session->unset_userdata('user');
        redirect(base_url().'/index.php/auth/login');
    }
}

?>