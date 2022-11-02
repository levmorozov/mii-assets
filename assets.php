<?php declare(strict_types=1);

namespace mii;

class MiiAssetsProxy {

    protected string|bool $targets = false;


    protected function swc($file): bool
    {
        $command = "swc --filename='$file'";

        if($this->targets) {
            $command .= " -C env.targets={$this->targets}";
        }

        return $this->executeBinary($command);
    }


    protected function executeBinary(string $command): bool {
        $output = '';
        $status = 0;

        exec(__DIR__."/bin/$command", $status, $output);

        if($output) {
            echo $output;
        }

        return $status === 0;
    }




}


