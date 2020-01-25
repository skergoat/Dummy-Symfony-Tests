# Dummy Symfony Tests

My first unit and fonctionnal tests on Symfony 5


# Run the app


1. Clone the repository 
    
         $ git clone 
 
2. Install dependencies 

         $ composer install 
         
3. Create database

         $ bin/console doctrine:database:create 

4. Go to src > Migrations dans remove all migrations if there are some in the repository 

         
5. Make migrations 

         $ bin/console make:migration 
         
6. Migrate 

         $ bin/console doctrine:migrations:migrate 
         
7. load fixtures 

         $ bin/console doctrine:fixtures:load 
         

# Run the tests 

8. Go to vendor > symfony http-kernel > ExceptionEvent.php and change this : 

    /**
     * Allows to create a response for a thrown exception.
     *
     * Call setResponse() to set the response that will be returned for the
     * current request. The propagation of this event is stopped as soon as a
     * response is set.
     *
     * You can also call setException() to replace the thrown exception. This
     * exception will be thrown if no response is set during processing of this
     * event.
   + * @final
     * @author Bernhard Schussek <bschussek@gmail.com>
     */
   - final class ExceptionEvent extends RequestEvent
     
9. And then : 
        
        $ bin/phpunit 
        
        
If everything goes well, the app passes the tests  
