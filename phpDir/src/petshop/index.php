<?php

abstract class Pet
{
    protected $name;
    protected $age;
    protected $color;

    public function __construct($name, $age, $color)
    {
        $this->name = $name;
        $this->age = $age;
        $this->color = $color;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getColor()
    {
        return $this->color;
    }

    abstract public function getType();
    abstract public function performAction();
}

class Dog extends Pet
{
    public function getType()
    {
        return 'Dog';
    }

    public function performAction()
    {
        return $this->name . ' barks loudly and wags tail!';
    }
}

class Cat extends Pet
{
    public function getType()
    {
        return 'Cat';
    }

    public function performAction()
    {
        return $this->name . ' meows and purrs softly!';
    }
}

class Bird extends Pet
{
    private $species;

    public function __construct($name, $age, $color, $species)
    {
        parent::__construct($name, $age, $color);
        $this->species = $species;
    }

    public function getType()
    {
        return 'Bird';
    }

    public function getSpecies()
    {
        return $this->species;
    }

    public function performAction()
    {
        return $this->name . ' chirps and flaps wings!';
    }
}

class PetShop
{
    protected $pets = [];

    public function addPet(Pet $pet)
    {
        $this->pets[] = $pet;
    }

    public function getAllPets()
    {
        return $this->pets;
    }

    public function getPetsByType($type)
    {
        return array_filter($this->pets, function ($pet) use ($type) {
            return $pet->getType() === $type;
        });
    }

    public function countPets()
    {
        return count($this->pets);
    }

    public function countPetsByType($type)
    {
        return count($this->getPetsByType($type));
    }
}

$petShop = new PetShop();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $petShop->addPet(new Dog('Buddy', 3, 'Brown'));
    $petShop->addPet(new Cat('Whiskers', 2, 'Gray'));
    $petShop->addPet(new Bird('Tweety', 1, 'Yellow', 'Canary'));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'add_pet':
            $name = filter_input(
                INPUT_POST,
                'name',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            );
            $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
            $color = filter_input(
                INPUT_POST,
                'color',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            );
            $type = filter_input(
                INPUT_POST,
                'type',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            );

            $species =
                $type === 'Bird'
                    ? filter_input(
                        INPUT_POST,
                        'species',
                        FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                    )
                    : null;

            if (!$name || !$age || !$color || !$type) {
                $error = 'All fields are required!';
            } else {
                switch ($type) {
                    case 'Dog':
                        $pet = new Dog($name, $age, $color);
                        break;
                    case 'Cat':
                        $pet = new Cat($name, $age, $color);
                        break;
                    case 'Bird':
                        if (!$species) {
                            $error = 'Species is required for birds!';
                            break;
                        }
                        $pet = new Bird($name, $age, $color, $species);
                        break;
                    default:
                        $error = 'Invalid pet type!';
                        break;
                }

                if (isset($pet)) {
                    $petShop->addPet($pet);
                    $success = "Successfully added {$name} to the pet shop!";
                }
            }
            break;
    }
}

$allPets = $petShop->getAllPets();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Pet Shop</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>🐾 Pet Shop 🐾</h1>
        </header>
        
        <section class="add-pet-form">
            <h2>Add New Pet</h2>
            <?php if (isset($error)): ?>
                <div class="error-message"><?= $error ?></div>
            <?php endif; ?>
            
            <?php if (isset($success)): ?>
                <div class="success-message"><?= $success ?></div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="name">Pet Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="age">Age (years)</label>
                    <input type="number" id="age" name="age" min="0" max="100" required>
                </div>
                
                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" id="color" name="color" required>
                </div>
                
                <div class="form-group">
                    <label for="type">Pet Type</label>
                    <select id="type" name="type" required onchange="toggleSpeciesField()">
                        <option value="">-- Select Pet Type --</option>
                        <option value="Dog">Dog</option>
                        <option value="Cat">Cat</option>
                        <option value="Bird">Bird</option>
                    </select>
                </div>
                
                <div class="form-group" id="species-group" style="display: none;">
                    <label for="species">Bird Species</label>
                    <input type="text" id="species" name="species">
                </div>
                
                <div class="form-buttons">
                    <input type="hidden" name="action" value="add_pet">
                    <button type="submit" class="btn-primary">Add Pet</button>
                </div>
            </form>
        </section>
        
        <section class="pet-list">
            <h2>Current Pets (<?= $petShop->countPets() ?>)</h2>
            
            <div class="pet-stats">
                <div class="stat">Dogs: <?= $petShop->countPetsByType(
                    'Dog',
                ) ?></div>
                <div class="stat">Cats: <?= $petShop->countPetsByType(
                    'Cat',
                ) ?></div>
                <div class="stat">Birds: <?= $petShop->countPetsByType(
                    'Bird',
                ) ?></div>
            </div>
            
            <?php if (empty($allPets)): ?>
                <p class="no-pets">No pets in the shop yet. Add some pets above!</p>
            <?php else: ?>
                <div class="pet-cards">
                    <?php foreach ($allPets as $index => $pet): ?>
                        <div class="pet-card <?= strtolower(
                            $pet->getType(),
                        ) ?>">
                            <h3><?= htmlspecialchars($pet->getName()) ?></h3>
                            <div class="pet-details">
                                <p><strong>Type:</strong> <?= htmlspecialchars(
                                    $pet->getType(),
                                ) ?></p>
                                <p><strong>Age:</strong> <?= htmlspecialchars(
                                    $pet->getAge(),
                                ) ?> years</p>
                                <p><strong>Color:</strong> <?= htmlspecialchars(
                                    $pet->getColor(),
                                ) ?></p>
                                <?php if ($pet instanceof Bird): ?>
                                    <p><strong>Species:</strong> <?= htmlspecialchars(
                                        $pet->getSpecies(),
                                    ) ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="pet-action" id="action-<?= $index ?>">
                                <?= htmlspecialchars($pet->performAction()) ?>
                            </div>
                            <button class="action-btn" onclick="triggerAction(<?= $index ?>)">Make <?= htmlspecialchars(
    $pet->getName(),
) ?> Act</button>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
 
        </section>
    </div>
    
    <script>
       
        function toggleSpeciesField() {
            const petType = document.getElementById('type').value;
            const speciesGroup = document.getElementById('species-group');
            
            if (petType === 'Bird') {
                speciesGroup.style.display = 'block';
                document.getElementById('species').setAttribute('required', 'required');
            } else {
                speciesGroup.style.display = 'none';
                document.getElementById('species').removeAttribute('required');
            }
        }
        
      
        function triggerAction(index) {
            const actionElement = document.getElementById(`action-${index}`);
            actionElement.classList.add('animate');
            
      
            setTimeout(() => {
                actionElement.classList.remove('animate');
            }, 1000);
        }
    </script>
</body>
</html>